<?php

namespace App\Models;

use Filament\Forms\Components\Concerns\HasFooterActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEnterprise extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
}
