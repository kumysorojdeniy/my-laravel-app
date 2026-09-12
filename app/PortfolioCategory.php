<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum PortfolioCategory: string implements HasLabel
{
    case Wargames = 'wargames';
    case Busts = 'busts';
    case Terrain = 'terrain';

    public function getLabel(): string
    {
        return match ($this) {
            self::Wargames => 'Настольные игры и варгеймы',
            self::Busts => 'Бюсты',
            self::Terrain => 'Террейн',
        };
    }
}
