<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
 
enum TypeLeadEnum: string implements HasLabel
{
    case Distribuitor = 'Distribuidora';
    case Retail = 'Varejo';
    case Wholesale = 'Atacado';
    case Industry = 'Industria';
    case Others = 'Outros';
    
    public function getLabel(): ?string
    {

        return match ($this) {
            self::Distribuitor => 'Distribuidor',
            self::Retail => 'Varejo',
            self::Wholesale => 'Atacado',
            self::Industry => 'Indústria',
            self::Others=>'Outros',
        };
    }
}