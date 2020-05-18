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

<?php if (!empty(session('app_error'))) : ?>
    <div class="alert alert-danger alert-dismissable p-2 px-4" role="alert" id="app_error">{{ session('app_error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- check for flash message -->
@if(empty(session('app_error')) && !empty(session('app_message')))
<div class="alert alert-success alert-dismissable p-2 px-4" role="alert" id="app_message">{{ session('app_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<?php if (!empty(session('status'))) : ?>
    <div class="alert alert-info alert-dismissable p-2 px-4" role="alert" id="app_error">{{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- check for flash warning message -->
@if(!empty(session('app_warning')))
<div class="alert alert-warning alert-dismissable p-2 px-4" role="alert" id="app_warning">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
    </button>
    {{ session('app_warning') }}
</div>
@endif
<!-- check for flash info message -->
@if(!empty(session('app_info')))
<div class="alert alert-info alert-dismissable p-2 px-4" role="alert" id="app_info">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
    </button>
    {{ session('app_info') }}
</div>
@endif
