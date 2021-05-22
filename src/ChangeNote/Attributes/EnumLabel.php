<?php

namespace App\ChangeNote\Attributes;

use Spatie\Enum\Enum;

#[\Attribute]
class EnumLabel extends ChangeValue
{
    public function __construct(private string $enumClass)
    {
    }

    public function getValue($value): string
    {
        try{
            /** @var Enum $enum */
            $enum = $this->enumClass::from($value);
        } catch (\Throwable $e){
            return 'Unknown';
        }

        return $enum->label;
    }
}
