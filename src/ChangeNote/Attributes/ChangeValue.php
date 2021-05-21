<?php
namespace App\ChangeNote\Attributes;

#[\Attribute]
abstract class ChangeValue
{
    abstract public function getValue($value);
}
