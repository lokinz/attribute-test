<?php

namespace App\ChangeNote;

#[\Attribute]
class ChangeName 
{
    public function __construct(public string $name)
    {
    }
}