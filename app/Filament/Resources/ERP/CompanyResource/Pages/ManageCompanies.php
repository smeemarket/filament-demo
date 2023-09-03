<?php

namespace App\Filament\Resources\ERP\CompanyResource\Pages;

use App\Filament\Resources\ERP\CompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCompanies extends ManageRecords
{
    protected static string $resource = CompanyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
