<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\UserPivots\Schemas\UserPivotForm;
use App\Filament\Resources\UserPivots\Schemas\UserPivotInfolist;
use App\Filament\Resources\UserPivots\Tables\UserPivotsTable;
use App\Filament\Resources\UserPivots\UserPivotResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $relatedResource = UserPivotResource::class;

    public function form(Schema $schema): Schema
    {
        return UserPivotForm::configure($schema);
    }

    public function infolist(Schema $schema): Schema
    {
        return UserPivotInfolist::configure($schema);
    }

    public function table(Table $table): Table
    {
        return UserPivotsTable::configure($table);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
