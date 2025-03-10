<?php

namespace App\Models;

use App\Enums\BranchEnum;
use App\Enums\PriorityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise',
        'branch',  
        'name_bussiness',
        'solution',
        'price_ativation',
        'price_month',
        'comission_ativation',
        'comission_month',
        'priority',
    ];

    public function getStatusAttribute($value)
    {
        return PriorityEnum::from($value);
    }


    public function branch(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'business_branch',);
    }
    


    public function enterprise(): BelongsToMany
    {
        return $this->belongsToMany(Enterprise::class, 'business_enterprise');
    }

    public function getStatusAttribute2($value)
    {
        return BranchEnum::from($value);
    }
}
