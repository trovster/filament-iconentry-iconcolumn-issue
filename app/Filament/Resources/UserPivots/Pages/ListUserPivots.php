<?php

namespace App\Filament\Resources\UserPivots\Pages;

use App\Filament\Resources\UserPivots\UserPivotResource;
use Filament\Resources\Pages\ListRecords;

class ListUserPivots extends ListRecords
{
    protected static string $resource = UserPivotResource::class;
}
