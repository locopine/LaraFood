@include('admin.includes.alerts')

<div class="form-group">
    <input type="text" name="name" id="name" value="{{ $detail->name ?? old('name') }}" placeholder="Nome do Detalhe" class="form-control">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">SAVE</button>
</div>
