<?php
namespace App\ChangeNote;

#[\Attribute]
class ChangeValue
{
    public function getValue($value)
    {
        return $value;
    }
}