<?php
namespace App;

class MyModel
{
    #[ChangeNote\ChangeName('Get Logs')]
    #[ChangeNote\ChangeBool(true: 'ON', false: 'OFF')]
    public bool $getLogs = false;

    #[ChangeNote\ChangeName('IP Address')]
    #[ChangeNote\ChangeValue]
    public string $ip = '192.168.0.100';

    #[ChangeNote\ChangeName('GPS Source')]
    #[ChangeNote\TraceName]
    public int $gpsTraceId = 1234;

    public $foo = 'No note here';
}