<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum ServiceType: string implements HasLabel
{
    case PhotoPolymer = 'photo_polymer';
    case Fdm = 'fdm';
    case Painting = 'painting';
    case Modeling = 'modeling';

    public function getLabel(): string
    {
        return match ($this) {
            self::PhotoPolymer => 'Фотополимерная печать',
            self::Fdm => 'FDM печать',
            self::Painting => 'Художественный покрас',
            self::Modeling => '3D-моделирование',
        };
    }
}
