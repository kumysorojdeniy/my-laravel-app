<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum PaintingOption: string implements HasLabel
{
    case None = 'none';
    case Simple = 'simple';
    case Advanced = 'advanced';

    public function getLabel(): string
    {
        return match ($this) {
            self::None => 'Без покраса',
            self::Simple => 'Tabletop',
            self::Advanced => 'Display',
        };
    }
}
