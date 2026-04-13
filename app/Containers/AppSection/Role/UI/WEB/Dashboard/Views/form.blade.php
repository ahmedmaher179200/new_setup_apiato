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

        <div class="col-md-6">
            <div class="form-group">
                <label for="display_name">{{ trans('dashboard.Display Name') }}</label>
                <input type="text" class="form-control
                @error('display_name') is-invalid @enderror"
                id="display_name" name="display_name"
                value="{{ old('display_name', isset($data) ? $data->display_name : '') }}">
                @error('display_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">{{ trans('dashboard.Description') }}</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', isset($data) ? $data->description : '') }}</textarea>
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
