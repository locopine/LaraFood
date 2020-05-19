<div class="card card-default mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $permission->id }}">
                </div>
            </div>
            <div class="col-md-3">
                {{ $permission->name }}
            </div>
            <div class="col-md-6">
                {{ $permission->description }}
            </div>
            <div class="col-md-2 text-right">
                <div class="btn-group">
                </div>
            </div>
        </div>
    </div>
</div>
