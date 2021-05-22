<?php

namespace App\ChangeNote;

use App\ChangeNote\Attributes as ChangeNote;
use InvalidArgumentException;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionProperty;

class ChangeNotes
{
    public static function getChanges($before, $after): array
    {
        if (get_class($before) !== get_class($after)) {
            throw new InvalidArgumentException('objects my be of the same type');
        }

        $changes = [];

        $reflection = new ReflectionClass($before);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $change = self::processChange($property->getName(), $before, $after);
            if (null !== $change) {
                $changes[] = $change;
            }
        }

        return $changes;
    }

    private static function processChange(string $property, $before, $after): ?Change
    {
        if ($before->{$property} === $after->{$property}) {
            return null;
        }

        $reflection = new ReflectionProperty($after, $property);
        $change = new Change();

        $changeName = self::getChangeName($reflection);
        if (null === $changeName) {
            return null;
        }

        $change->name = $changeName->name;

        $changeValue = self::getChangeValue($reflection);
        if (null === $changeValue) {
            return $change;
        }

        //var_dump($before, $after);
        $change->from = $changeValue->getValue($before->{$property});
        $change->to = $changeValue->getValue($after->{$property});

        return $change;
    }

    private static function getChangeName(ReflectionProperty $reflection): ?ChangeNote\PropertyName
    {
        return self::getAttributeInstance(ChangeNote\PropertyName::class, $reflection);
    }

    private static function getChangeValue(ReflectionProperty $reflection): ?ChangeNote\ChangeValue
    {
        return self::getAttributeInstance(ChangeNote\ChangeValue::class, $reflection);
    }

    private static function getAttributeInstance(string $name, ReflectionProperty $reflection): ?object
    {
         $attributes = $reflection->getAttributes(
            $name,
            ReflectionAttribute::IS_INSTANCEOF
        );

        if(!sizeof($attributes)){
            return null;
        }

        return $attributes[0]->newInstance();
    }
}
