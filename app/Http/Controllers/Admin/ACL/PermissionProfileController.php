<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission, $records;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->permission = $permission;
        $this->profile = $profile;
        $this->records = new \stdClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions($idProfile)
    {
        $records = $this->records->title = "Permissões do Perfil";

        $profile = $this->profile->with('permissions')->findOrFail($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate(8);

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions', 'records'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profiles($idPermission)
    {
        $records = new \stdClass;
        $records->title = "Perfis das Permissões";

        if (!$permission = $this->permission->with('profiles')->findOrFail($idPermission)) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate(8);

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionsAvailable(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->findOrFail($idProfile)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->q);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->findOrFail($idProfile)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()->back()->with('app_warning', 'Precisa escolher pelo menos uma permissão.');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id)->with('message', 'Permissão definida com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detachPermissionsProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->findOrFail($idProfile);
        $permission = $this->permission->findOrFail($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return response()->json([
            'success' => 'Desvinculado com sucesso.',
            'url' => route('profiles.permissions', $profile->id),
        ]);

        // return redirect()->route('profiles.index', $profile->id)->with('message', 'Permissão desvinculada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detachProfilesPermission($idPermission, $idProfile)
    {
        $permission = $this->permission->findOrFail($idPermission);
        $profile = $this->profile->findOrFail($idProfile);

        if (!$permission || !$profile) {
            return redirect()->back();
        }

        $permission->profiles()->detach($profile);

        return response()->json([
            'success' => 'Desvinculado com sucesso.',
            'url' => route('profiles.permissions', $permission->id),
        ]);

        // return redirect()->route('profiles.index', $profile->id)->with('message', 'Permissão desvinculada com sucesso.');
    }
}
