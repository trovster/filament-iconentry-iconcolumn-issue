<?php

namespace App\Filament\Resources\UserPivots\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserPivotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('item_id')
                    ->relationship('item', 'name')
                    ->required(),
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('finished_at'),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
