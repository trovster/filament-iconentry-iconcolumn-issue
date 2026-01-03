<?php

namespace App\Filament\Resources\UserPivots\Schemas;

use App\Filament\Resources\Users\RelationManagers\ItemsRelationManager;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserPivotInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->hiddenOn([
                        ItemsRelationManager::class,
                    ]),
                TextEntry::make('item.name'),
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('started_at')
                    ->date(),
                TextEntry::make('finished_at')
                    ->date(),
                TextEntry::make('order'),
                IconEntry::make('status')
                    ->boolean(),
            ]);
    }
}
