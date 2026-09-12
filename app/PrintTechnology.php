<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum PrintTechnology: string implements HasLabel
{
    case Resin = 'resin';
    case Fdm = 'fdm';

    public function getLabel(): string
    {
        return match ($this) {
            self::Resin => 'Фотополимер',
            self::Fdm => 'FDM',
        };
    }
}
