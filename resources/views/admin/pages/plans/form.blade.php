{{-- resources/views/admin/pages/plans/form.blade.php --}}

{{-- @include('admin.includes.alerts') --}}

<div class="form-group">
    <input type="text" value="{{ $plan->name ?? old('name') }}" name="name" placeholder="Nome" class="form-control">
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <input type="text" value="{{ $plan->url ?? old('url') }}" name="url" placeholder="Site" class="form-control">
</div>
@error('url')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <input type="text" value="{{ $plan->price ?? old('price') }}" id="price" maxlength="15" name="price" min="0" step="0.01" placeholder="Preço" class="form-control">
</div>
@error('price')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <input type="text" value="{{ $plan->description ?? old('description') }}" name="description" placeholder="Descrição" class="form-control">
</div>
@error('description')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="far fa-save"></i> SAVE</button>
</div>

@push('css')
<style>
    .btn-dark {
        background-color: #343A40;
    }
</style>
@endpush

@push('js')
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
<!-- <script src="{{ asset('js/inputmask.min.js') }}"></script> -->
<script>
    $(document).ready(function() {
        $("#price").inputmask("currency");
        console.log($('#price'));

    });
</script>
@endpush
