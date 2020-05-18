@include('admin.includes.alerts')

<form action="{{ $route ?? route('profiles.store') }}" method="POST">
    {{ csrf_field() }}

    <input type="hidden" name="_method" value="{{ isset($method) ? $method :'POST' }}" />

    <div class="form-group">
        <input type="text" value="{{ $model->name ?? old('name') }}" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Nome do Perfil">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $model->description ?? old('description') }}" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Descrição do Perfil">
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear" />
        <input type="submit" class="btn btn-primary" value="Save" />
    </div>
</form>
