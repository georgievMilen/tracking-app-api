<?php

namespace App\Services;

class ColorService
{
    public static function randomColor(): string
    {
        return self::randomColorPart() . self::randomColorPart() . self::randomColorPart();
    }

    private static function randomColorPart(): string{
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
}
