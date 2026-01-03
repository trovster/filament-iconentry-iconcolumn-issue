<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Items\ItemResource;
use App\Filament\Resources\UserPivots\Schemas\UserPivotForm;
use App\Filament\Resources\UserPivots\Schemas\UserPivotInfolist;
use App\Filament\Resources\UserPivots\Tables\UserPivotsTable;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $relatedResource = ItemResource::class;

    public function form(Schema $schema): Schema
    {
        return UserPivotForm::configure($schema);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            TextEntry::make('name'),
            TextEntry::make('uuid')
                ->label('UUID'),
        ]);
    }

    public function table(Table $table): Table
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
            ])
            ->recordActions([
                ViewAction::make()->modal(),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
