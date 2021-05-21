<?php
namespace App\Models;
use App\ChangeNote\Attributes as ChangeNote;

class MyModel
{
    #[ChangeNote\PropertyName('Get Logs')]
    #[ChangeNote\BoolLabel(true: 'ON', false: 'OFF')]
    public bool $getLogs = false;

    #[ChangeNote\PropertyName('IP Address')]
    #[ChangeNote\Generic]
    public string $ip = '192.168.0.100';

    #[ChangeNote\PropertyName('GPS Source')]
    #[ChangeNote\TraceName]
    public int $gpsTraceId = 1234;

    public string $foo = 'No note here';
}
