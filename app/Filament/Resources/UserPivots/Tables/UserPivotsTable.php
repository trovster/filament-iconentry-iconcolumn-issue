<?php

namespace App\Filament\Resources\UserPivots\Tables;

use App\Filament\Resources\Users\RelationManagers\ItemsRelationManager;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserPivotsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->hiddenOn(
                        ItemsRelationManager::class,
                    ),
                TextColumn::make('item.name'),
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
            ])
            ->recordActions([
                ViewAction::make()
                    ->icon('heroicon-o-eye')
                    ->iconButton(),

                EditAction::make()
                    ->icon('heroicon-o-pencil-square')
                    ->iconButton(),
            ]);
    }
}
