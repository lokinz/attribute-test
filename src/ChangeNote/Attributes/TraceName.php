<?php
namespace App\ChangeNote\Attributes;

#[\Attribute]
class TraceName extends ChangeValue
{
    private $traceNames = [
        1234 => 'GPS Trace 1',
        1235 => 'GPS Trace 2'
    ];

    public function getValue($value)
    {
        return $this->getTraceName($value);
    }

    private function getTraceName(int $traceId): string
    {
       return $this->traceNames[$traceId] ?? 'Unknown Trace';
    }
}
