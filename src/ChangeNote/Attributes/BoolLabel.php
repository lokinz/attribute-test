<?php

namespace App\ChangeNote\Attributes;

#[\Attribute]
class BoolLabel extends ChangeValue
{

    public function __construct(
        private string $true = 'TRUE',
        private string $false = 'FALSE')
    {
    }

    public function getValue($value): string
    {
        $state = filter_var($value, FILTER_VALIDATE_BOOLEAN);

        return $state ? $this->true : $this->false;
    }


}
