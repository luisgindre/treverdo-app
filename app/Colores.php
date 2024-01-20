<?php

namespace App;

use Filament\Support\Colors\Color;
use Spatie\Color\Hex;
use Spatie\Color\Rgb;

class Colores extends Color
{
  
    public const Treverdo = [
        50 => '#fdfde8',
        100 =>'#f7facd',
        200 =>'#f0f6a0',
        300 =>'#e2ed69',
        400 =>'#d0e03b',
        500 =>'#b9ce1d',
        600 =>'#8b9e12',
        700 =>'#697813',
        800 =>'#535f15',
        900 =>'#465116',
        950 =>'#252d06',
    ];

    

    public static function all(): array
    {
        return [
            'slate' => static::Slate,
            'gray' => static::Gray,
            'zinc' => static::Zinc,
            'neutral' => static::Neutral,
            'stone' => static::Stone,
            'red' => static::Red,
            'orange' => static::Orange,
            'amber' => static::Amber,
            'yellow' => static::Yellow,
            'lime' => static::Lime,
            'green' => static::Green,
            'emerald' => static::Emerald,
            'teal' => static::Teal,
            'cyan' => static::Cyan,
            'sky' => static::Sky,
            'blue' => static::Blue,
            'indigo' => static::Indigo,
            'violet' => static::Violet,
            'purple' => static::Purple,
            'fuchsia' => static::Fuchsia,
            'pink' => static::Pink,
            'rose' => static::Rose,
            'treverdo' => static::Treverdo,
        ];
    }
}
