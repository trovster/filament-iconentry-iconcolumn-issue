<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                // using $state is broken.
                IconColumn::make('email')
                    ->label('Link (Broken)')
                    ->icon('heroicon-o-eye')
                    ->url(static fn (?string $state): ?string => $state),

                IconColumn::make('link')
                    ->icon('heroicon-o-eye')
                    ->state(static fn (Model $model): ?string => $model->getAttribute('email'))
                    ->url(static fn (Model $model): ?string => $model->getAttribute('email')),
            ]);
    }
}
