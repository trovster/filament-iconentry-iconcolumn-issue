<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
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
