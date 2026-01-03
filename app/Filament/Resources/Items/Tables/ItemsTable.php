<?php

namespace App\Filament\Resources\Items\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('uuid')
                    ->label('UUID'),
                TextColumn::make('started_at')
                    ->label('Start')
                    ->date('d/m/Y'),
                TextColumn::make('finished_at')
                    ->label('Finish')
                    ->date('d/m/Y'),
                TextColumn::make('order')
                    ->numeric()
                    ->alignCenter()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean(),
            ]);
    }
}
