<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name </th>
            <th>Description </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td> {{ $permission->name }} </td>
            <td> {{ $permission->description }} </td>
            <td class="text-right"><a class="btn btn-secondary" href="{{ route('permissions.show',$permission->id) }}">
                    <span class="fa fa-eye"></span>
                </a><a class="btn btn-secondary ml-1" href="{{ route('permissions.edit',$permission->id) }}">
                    <span class="fa fa-edit"></span>
                </a>
                <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-secondary cursor-pointer">
                        <i class="text-danger fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <div class="d-flex justify-content-center">
                    {{{ $permissions->render() }}}
                </div>
            </td>
        </tr>
    </tfoot>
</table>
