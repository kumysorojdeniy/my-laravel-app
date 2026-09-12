<?php

namespace App;

use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasLabel
{
    case New = 'new';
    case InProgress = 'in_progress';
    case Done = 'done';
    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'Новая',
            self::InProgress => 'В работе',
            self::Done => 'Готово',
            self::Cancelled => 'Отменена',
        };
    }
}
