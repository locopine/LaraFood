<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    // Um Plano pode ter vários detalhes
    public function details()
    {
        return $this->hasMany(DetailsPlan::class);
    }

    /**
     * Get Profiles
     */

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate(8);

        return $results;
    }

    /**
     * Profile not linked with this Plan
     * Explicação completa em
     * Curso Laravel (LaraFood) > LaraFood > Módulo 06 > Aula 03
     */

    public function profilesAvailable($filter = null)
    {
        $profiles = Plan::whereNotIn('id', function ($query) {
            $query->select("plan_profile.plan_id");
            $query->from("plan_profile");
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('name', 'LIKE', "%{$filter}%");
                    $queryFilter->orWhere('description', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate(6);

        return $profiles;
    }
}
