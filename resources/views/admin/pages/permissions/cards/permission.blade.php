<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a class="fa fa-eye btn btn-secondary" href="{{ route('permissions.show',$record->id) }}">&nbsp;&nbsp;{{ $record->id }}</a>
                <h3 class="d-inline-flex align-items-end pl-1 pb-0">Permissão de <b class="pl-2"> {{ $record->name }}</b></h3>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary mr-1" href="{{ route('permissions.edit',$record->id) }}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('permissions.destroy',$record->id) }}" method="post" style="display: inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-secondary cursor-pointer">
                            <i class="text-danger fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $record->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $record->description }}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
