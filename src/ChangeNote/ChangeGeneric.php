<?php
namespace App\ChangeNote;

#[\Attribute]
class ChangeGeneric extends ChangeValue
{
    public function getValue($value)
    {
        return $value;
    }
}