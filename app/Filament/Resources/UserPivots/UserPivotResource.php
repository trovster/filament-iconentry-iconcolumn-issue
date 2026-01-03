<?php

namespace App\Filament\Resources\UserPivots;

use App\Filament\Resources\UserPivots\Pages\CreateUserPivot;
use App\Filament\Resources\UserPivots\Pages\EditUserPivot;
use App\Filament\Resources\UserPivots\Pages\ListUserPivots;
use App\Filament\Resources\UserPivots\Pages\ViewUserPivot;
use App\Filament\Resources\UserPivots\Schemas\UserPivotForm;
use App\Filament\Resources\UserPivots\Schemas\UserPivotInfolist;
use App\Filament\Resources\UserPivots\Tables\UserPivotsTable;
use App\Models\UserPivot;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserPivotResource extends Resource
{
    protected static ?string $model = UserPivot::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'uuid';

    public static function form(Schema $schema): Schema
    {
        return UserPivotForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserPivotInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserPivotsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserPivots::route('/'),
        ];
    }
}
