<?php

namespace App\ChangeNote\Attributes;

#[\Attribute]
class PropertyName
{
    public function __construct(public string $name)
    {
    }
}
