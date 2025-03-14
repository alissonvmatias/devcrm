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
        'enterprise_id',
        'branch_id',  
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


    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
