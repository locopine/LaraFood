<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name </th>
            <th>Description </th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td> {{ $record->name }} </td>
            <td> {{ $record->description }} </td>
            <td class="text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{ route('permissions.show', $record->id) }}">
                        <span class="fa fa-eye"></span>
                    </a>
                    <a class="btn btn-secondary ml-1" href="{{ route('permissions.edit', $record->id) }}">
                        <span class="fa fa-edit"></span>
                    </a>
                    <a class="btn btn-secondary ml-1" href="{{ route('permissions.profiles', $record->id) }}">
                        <i class="far fa-address-book"></i>
                    </a>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <div class="d-flex justify-content-center">
                    {{{ $records->render() }}}
                </div>
            </td>
        </tr>
    </tfoot>
</table>
