<?php

namespace App\Filament\Resources\TypeEnterpriseResource\Pages;

use App\Filament\Resources\TypeEnterpriseResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTypeEnterprises extends ManageRecords
{
    protected static string $resource = TypeEnterpriseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    
}
