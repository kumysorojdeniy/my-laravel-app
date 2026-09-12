<?php

namespace App\Filament\Resources\Services\Schemas;

use App\ServiceType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Тип')
                    ->options(ServiceType::class)
                    ->default(ServiceType::PhotoPolymer->value)
                    ->required(),
                TextInput::make('price')
                    ->label('Цена')
                    ->required()
                    ->maxLength(50),
                Textarea::make('description')
                    ->label('Описание')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
