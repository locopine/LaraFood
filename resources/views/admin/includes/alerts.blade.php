@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@push('js')
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "0",
        "timeOut": "10000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@if(session('message'))
<div class="alert alert-success">
    <script>
        toastr["success"]("{{ session('message') }}", "{{ session('info') }}")
    </script>
    <!-- {{ session('message') }} -->
</div>
@endif

@if(session('error'))

<div class="alert alert-success">
    <script>
        toastr["error"]("{{ session('error') }}")
    </script>
</div>

@endif

@endpush
