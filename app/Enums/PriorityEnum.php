<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
 
enum PriorityEnum: string implements HasLabel
{
    case None = 'Nenhum';
    case Low = 'Baixa';
    case Media = 'Média';
    case Discharge = 'Alta';

    
    public function getLabel(): ?string
    {

        return match ($this) {
            self::None => 'Nenhum',
            self::Low => 'Baixa',
            self::Media => 'Média',
            self::Discharge => 'Alta',
        };
    }
}