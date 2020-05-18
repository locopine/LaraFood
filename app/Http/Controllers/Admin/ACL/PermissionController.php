<?php

namespace App\Http\Controllers\Admin\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use stdClass;

/**
 * Description of PermissionController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Search.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->q;

        $records = $this->repository->where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(8);
        $records->title = ucfirst($request->segment(2));

        $records->appends(['q' => $search]);

        return view('admin.pages.permissions.index', compact('records', 'search'));
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
        $records->title = ucfirst($request->segment(2));

        return view('admin.pages.permissions.index', compact('records'));
    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = $permission = $this->repository->findOrFail($id);
        $profiles = $record->profiles()->get();

        return view('admin.pages.permissions.show', compact('record', 'permission', 'profiles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $permissions = $this->repository->all();

        $model = new \stdClass;
        $model->title = ucfirst($request->segment(2));

        return view('admin.pages.permissions.create', compact('model', 'permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        ddd($request->all());
        $model = $this->repository->create($request->all());

        if ($model) {

            session()->flash('app_message', 'Permission saved successfully');
            return redirect()->route('permissions.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Permission');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $model = $this->repository->findOrFail($id);

        return view('admin.pages.permissions.edit', compact('model', 'permission'));
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        $permission = $this->repository->findOrFail($id);

        if ($permission->update($request->all())) {

            session()->flash('app_message', 'Permission successfully updated');
            return redirect()->route('permissions.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Permission');
        }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        if ($this->repository->findOrFail($id)->delete($id)) {
            session()->flash('app_message', 'Permission successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Permission');
        }

        return redirect()->back();
    }
}
