<?php
namespace App\ChangeNote\Attributes;

#[\Attribute]
class Generic extends ChangeValue
{
    public function getValue($value)
    {
        return $value;
    }
}
