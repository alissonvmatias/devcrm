<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function business(): BelongsToMany
    {
        return $this->belongsToMany(Business::class, 'business_branch');
    }
    
}
