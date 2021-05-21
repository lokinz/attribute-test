<?php

namespace App\ChangeNote;

#[\Attribute]
class ChangeBool extends ChangeValue
{

    public function __construct(
        public string $true = 'TRUE', 
        public string $false = 'FALSE'
        )
    {
    }

    public function getValue($value)
    {
        $state = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        
        return $state ? $this->true : $this->false;
    }


}