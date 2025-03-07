<?php

namespace App\Models;

use App\Enums\PriorityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getStatusAttribute($value)
    {
        return PriorityEnum::from($value);
    }

    public function branch(): BelongsToMany
    {
        return $this->belongsToMany(branch::class, 'business_branch');
    }
}
