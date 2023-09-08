<?php

namespace App\Filament\Resources\Blog\CategoryResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\Blog\CategoryResource;

class ManageCategories extends ManageRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
