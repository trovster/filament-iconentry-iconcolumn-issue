<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Items\ItemResource;
use App\Filament\Resources\Items\Schemas\ItemForm;
use App\Filament\Resources\Items\Schemas\ItemInfolist;
use App\Filament\Resources\Items\Tables\ItemsTable;
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

    protected static ?string $relatedResource = ItemResource::class;

    public function form(Schema $schema): Schema
    {
        return ItemForm::configure($schema);
    }

    public function infolist(Schema $schema): Schema
    {
//        return UserPivotInfolist::configure($schema);
        return ItemInfolist::configure($schema);
    }

    public function table(Table $table): Table
    {
//        return UserPivotsTable::configure($table);
        return ItemsTable::configure($table);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
