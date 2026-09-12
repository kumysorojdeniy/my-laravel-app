<?php

namespace App\Filament\Resources\PortfolioItems\Schemas;

use App\PortfolioCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PortfolioItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Select::make('category')
                    ->label('Категория')
                    ->options(PortfolioCategory::class)
                    ->default(PortfolioCategory::Wargames->value)
                    ->required(),
                FileUpload::make('image')
                    ->label('Фото работы')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('portfolio')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Описание')
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
