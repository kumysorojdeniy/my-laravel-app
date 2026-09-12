<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Models\Order;
use App\OrderStatus;
use Filament\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('№')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                TextColumn::make('contact')
                    ->label('Контакты')
                    ->searchable(),
                TextColumn::make('technology')
                    ->label('Технология')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state?->getLabel() ?? $state),
                TextColumn::make('painting')
                    ->label('Покрас')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn ($state) => $state?->getLabel() ?? $state),
                IconColumn::make('assembly')
                    ->label('Сборка')
                    ->boolean(),
                TextColumn::make('scale')
                    ->label('Масштаб')
                    ->toggleable(),
                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state?->getLabel() ?? $state)
                    ->color(fn (OrderStatus $state): string => match ($state) {
                        OrderStatus::New => 'gray',
                        OrderStatus::InProgress => 'info',
                        OrderStatus::Done => 'success',
                        OrderStatus::Cancelled => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options(OrderStatus::class),
            ])
            ->recordActions([
                Action::make('download_file')
                    ->label('Скачать файл')
                    ->visible(fn (Order $record): bool => filled($record->file_path))
                    ->url(fn (Order $record): string => route('orders.file.download', $record))
                    ->openUrlInNewTab(),
            ]);
    }
}
