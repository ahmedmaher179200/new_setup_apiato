<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ trans('dashboard.Name') }} <span class="text-danger">*</span></label>
                <input type="text"
                        class="form-control
                        @error('name') is-invalid @enderror"
                        id="name" name="name"
                        value="{{ old('name', isset($data) ? $data->name : '') }}" required>

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
