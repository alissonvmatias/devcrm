<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\TypeLeadEnum;

class Enterprise extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function getStatusAttribute($value)
    {
        return TypeLeadEnum::from($value);
    }
}
