<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),

                IconEntry::make('email')
                    ->label('Link (Broken)')
                    ->icon('heroicon-o-eye')
                    ->url(static fn (?string $state): ?string => $state),

                IconEntry::make('link')
                    ->icon('heroicon-o-eye')
                    ->state(static fn (Model $record): ?string => $record->getAttribute('email'))
                    ->url(static fn (Model $record): ?string => $record->getAttribute('email')),
            ]);
    }
}
