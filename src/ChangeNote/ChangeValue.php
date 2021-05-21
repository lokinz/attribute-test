<?php
namespace App\ChangeNote;

#[\Attribute]
abstract class ChangeValue
{
    abstract public function getValue($value);
}