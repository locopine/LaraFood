<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Get Permissions
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get plans
     */

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /**
     * Permission not linked with this Profile
     * Explicação completa em
     * Curso Laravel (LaraFood) > LaraFood > Módulo 06 > Aula 03
     */

    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('id', function ($query) {
            $query->select("permission_profile.permission_id");
            $query->from("permission_profile");
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter) {
                    $queryFilter->where('name', 'LIKE', "%{$filter}%");
                    $queryFilter->orWhere('description', 'LIKE', "%{$filter}%");
                }
            })
            ->paginate(6);

        return $permissions;
    }
}
