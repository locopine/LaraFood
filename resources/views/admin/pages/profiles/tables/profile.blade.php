<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição do Perfil</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $record->name }}
                </td>
                <td>
                    {{ $record->description }}
                </td>
                <td>
                    <a class="btn btn-secondary" href="{{ route('profiles.show', $record->id) }}">
                        <span class="fa fa-eye"></span>
                    </a>
                    <a class="ml-1 btn btn-secondary" href="{{ route('profiles.edit', $record->id) }}">
                        <span class="fas fa-edit"></span>
                    </a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{route('profiles.destroy',$record->id)}}" method="post" style="display: inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-secondary cursor-pointer">
                            <i class="text-danger fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
    </table>
</div>
