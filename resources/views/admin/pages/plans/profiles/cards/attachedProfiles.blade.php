<div id="profile{{ $profile->id }}" class="card card-default mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="checkbox" checked value="{{ $profile->id }}" name="profiles" id="profiles" autocomplete="off">
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                {{ $profile->name }}
            </div>
            <div class="col-md-7">
                {{ $profile->description }}
            </div>
        </div>
    </div>
</div>

@if(isset($profiles[0]->id))
@push('js')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        var profile = "#profile{{ $profile->id }}";
        var urlDetach = "{{ route('permissions.profiles.detach', [$profile->id, $plan->id]) }}";

        $("#profile{{ $profile->id }}").click(function(e) {
            if ($(e.target).prop("checked") == false) {

                e.preventDefault();

                var reg = $(this);
                let formValues = {
                    id: e.target.value,
                    _method: "DELETE"
                };
                formValues = JSON.stringify(formValues);

                $.ajax({
                    url: urlDetach,
                    cache: false,
                    data: formValues,
                    dataType: 'JSON',
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        reg.remove();

                        setTimeout(function() {
                            location.reload();
                        }, 1);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                })
            }
        });
    });
</script>
@endpush
@endif
