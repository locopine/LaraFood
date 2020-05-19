<div class="card card-default mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-1">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="checkbox" name="profiles[]" id="profiles" value="{{ $profile->id }}" autocomplete="off">
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                {{ $profile->name }}
            </div>
            <div class="col-md-8">
                {{ $profile->description }}
            </div>
        </div>
    </div>
</div>
