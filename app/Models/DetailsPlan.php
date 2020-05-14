<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsPlan extends Model
{
    protected $table = 'details_plan';

    protected $fillable = ['name'];

    // Um Detalhe ele é espcífico de um Plano
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
