<?php

namespace App\Filament\Resources\BranchResource\Pages;

use App\Filament\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBranch extends CreateRecord
{
    protected static string $resource = BranchResource::class;

    
    //Essa função é para ao criar a filial ele voltar para as grids.
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
