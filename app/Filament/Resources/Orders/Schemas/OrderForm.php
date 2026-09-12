<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\OrderStatus;
use App\PaintingOption;
use App\PrintTechnology;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Имя')
                    ->disabled(),
                TextInput::make('contact')
                    ->label('Контакты')
                    ->disabled(),
                TextInput::make('technology')
                    ->label('Технология печати')
                    ->disabled()
                    ->formatStateUsing(fn (string $state): string => PrintTechnology::from($state)->getLabel()),
                TextInput::make('painting')
                    ->label('Опция покраса')
                    ->disabled()
                    ->formatStateUsing(fn (string $state): string => PaintingOption::from($state)->getLabel()),
                Toggle::make('assembly')
                    ->label('Сборка')
                    ->disabled(),
                TextInput::make('scale')
                    ->label('Масштаб')
                    ->disabled(),
                TextInput::make('file_path')
                    ->label('Файл модели')
                    ->disabled(),
                Textarea::make('comment')
                    ->label('Комментарий')
                    ->rows(4)
                    ->disabled()
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Статус')
                    ->options(OrderStatus::class)
                    ->default(OrderStatus::New->value)
                    ->required(),
            ]);
    }
}
