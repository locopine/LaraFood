<div class="card card-default mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-1">
                <a class="btn btn-secondary fa fa-eye" href="{{ route('profiles.show',$record->id) }}"> {{ $record->id }}</a>
            </div>
            <div class="col-md-3">
                {{ $record->name }}
            </div>
            <div class="col-md-6">
                {{ $record->description }}
            </div>
            <div class="col-md-2 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{ route('profiles.edit',$record->id) }}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <form class="ml-1" onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('profiles.destroy',$record->id) }}" method="post" style="display: inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-secondary cursor-pointer">
                            <i class="text-danger fas fa-trash"></i>
                        </button>
                    </form>
                    <a class="btn btn-secondary ml-1" href="{{ route('profiles.permissions', $record->id) }}">
                        <span class="fa fa-lock"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
