<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Permission;

/**
 * Description of ProfileController
 */
class ProfileController extends Controller
{
    public $repository;
    public $permissions;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->repository = $profile;
        $this->permissions = $permission;
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $records = $this->repository->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(8);

        $records->appends(['q' => $search]);

        return view('admin.pages.profiles.index', compact('records', 'search'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = $this->repository->latest()->paginate(8);

        return view('admin.pages.profiles.index', compact('records'));
    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = $record = $this->repository->findOrFail($id);
        $permissions = $record->permissions()->get();

        return view('admin.pages.profiles.show', compact('profile', 'record', 'permissions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('admin.pages.profiles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        $model = $this->repository->create($request->all());

        if ($model) {

            session()->flash('app_message', 'Profile saved successfully');
            return redirect()->route('profiles.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Profile');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOrFail($id);

        return view('admin.pages.profiles.edit', compact('model'));
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, Profile $profile)
    {
        $profile->fill($request->all());

        if ($profile->save()) {

            session()->flash('app_message', 'Profile successfully updated');
            return redirect()->route('profiles.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Profile');
        }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $profile = $this->repository->findOrFail($id);

        if ($this->repository->findOrFail($id)->delete()) {
            session()->flash('app_message', 'Profile successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Profile');
        }

        return redirect()->back();
    }
}
