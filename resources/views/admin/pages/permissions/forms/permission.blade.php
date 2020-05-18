@yield('header')
<form action="{{ isset($route)?$route:route('permissions.store') }}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{ isset($method)?$method:'POST' }}" />
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : ''  }}" name="name" id="name" value="{{ old('name', $model->name ?? '') }}" placeholder="" maxlength="255">
        @if($errors->has('name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
        @endif
    </div>
    {{--
    <div class="form-group">
        <label for="permissions">Permissões</label>
        <select class="form-control form-control-sm" name="permissions" id="permissions">
            <option value="">Selecione uma permissão</option>
            @foreach($permissions as $permission)
            <option value="{{  $permission->id }}" {{ old('permissions')==$permission->id ? "selected" : "" }}>{{ $permission->name }}</option>
    @endforeach
    </select>
    </div>
    --}}
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : ''  }}" name="description" id="description" value="{{ old('description',$model->description ?? '') }}" placeholder="" maxlength="255">
        @if($errors->has('description'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </div>
        @endif
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear" />
        <input type="submit" class="btn btn-primary" value="Save" />

    </div>
</form>
