<?php

namespace App\Filament\Resources\Blog\AuthorResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\Blog\AuthorResource;

class ManageAuthors extends ManageRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
