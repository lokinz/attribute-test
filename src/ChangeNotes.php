<?php

namespace App;

use App\ChangeNote\ChangeName;
use App\ChangeNote\ChangeValue;
use InvalidArgumentException;
use ReflectionAttribute;

class ChangeNotes
{
    public static function getChanges($before, $after): array
    {
        if( get_class($before) !== get_class($after) ){
            throw new InvalidArgumentException('objects my be of the same type');
        }

        $changes = [];

        $reflection = new \ReflectionClass($before);
        $properties = $reflection->getProperties();

        foreach ($properties as $property){
            $change = self::processChange($property->getName(), $before, $after);
            if(null !== $change){
                $changes[] = $change;
            }
        }

        return $changes;
    }

    private static function processChange(string $property, $before, $after): ?Change
    {
        if($before->{$property} === $after->{$property}){
            return null;
        }

        $reflection = new \ReflectionProperty($after, $property);
        $change = new Change;
        
        $changeName = self::getChangeName($reflection);
        if(null === $changeName){
            return null;
        }

        $change->name = $changeName->name;
        
        $changeValue = self::getChangeValue($reflection);
        if(null === $changeValue){
            return $change;
        }

        //var_dump($before, $after);
        $change->from = $changeValue->getValue($before->{$property});
        $change->to = $changeValue->getValue($after->{$property});

       return $change;
    }

    private static function getChangeName(\ReflectionProperty $reflection): ?ChangeName
    {
        $attributes = $reflection->getAttributes(
            ChangeName::class, 
            ReflectionAttribute::IS_INSTANCEOF
        );

        if(!sizeof($attributes)){
            return null;
        }

        return $attributes[0]->newInstance();
    }

    private static function getChangeValue(\ReflectionProperty $reflection): ?ChangeValue
    {
        $attributes = $reflection->getAttributes(
            ChangeValue::class, 
            ReflectionAttribute::IS_INSTANCEOF
        );

        if(!sizeof($attributes)){
            return null;
        }

        return $attributes[0]->newInstance();
    }
}
