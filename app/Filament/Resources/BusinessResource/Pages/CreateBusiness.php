<?php

namespace App\Filament\Resources\BusinessResource\Pages;

use App\Filament\Resources\BusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBusiness extends CreateRecord
{
    protected static string $resource = BusinessResource::class;

    
    //Essa função é para ao criar o negócio ele voltar para as grids.
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
