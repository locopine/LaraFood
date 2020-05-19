<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanProfile extends Model
{
    protected $table = 'plan_profile';

    protected $fillable  = ['profile_id'];

    // Um Detalhe ele é espcífico de um Plano
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
