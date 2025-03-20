<?php

namespace App\Filament\Resources\EnterpriseResource\Pages;

use App\Filament\Resources\EnterpriseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEnterprise extends CreateRecord
{
    protected static string $resource = EnterpriseResource::class;

//Essa função é para ao criar o empresa ele voltar para as grids.
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
