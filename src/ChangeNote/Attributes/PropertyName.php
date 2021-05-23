<?php

namespace App\ChangeNote\Attributes;

#[\Attribute]
class PropertyName
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
