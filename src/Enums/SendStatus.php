<?php
namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self IDLE()
 * @method static self PENDING()
 * @method static self DONE()
 * @method static self ERROR()
 */
class SendStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'IDLE' => 0,
            'PENDING' => 1,
            'DONE' => 2,
            'ERROR' => 3,
        ];
    }
}
