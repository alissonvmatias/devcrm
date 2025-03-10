<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
 
enum BranchEnum: string implements HasLabel
{
    case SophosTec = 'Sophos Tec';
    case SophosSistemas = 'Sophos7 Sistemas';


    
    public function getLabel(): ?string
    {

        return match ($this) {
            self::SophosTec => 'Sophos Tec',
            self::SophosSistemas => 'Sophos7 Sistemas',

        };
    }
}