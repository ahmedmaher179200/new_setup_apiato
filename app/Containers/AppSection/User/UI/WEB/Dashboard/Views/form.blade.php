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
                <label for="email">{{ trans('dashboard.Email') }} <span class="text-danger">*</span></label>
                <input type="email" class="form-control
                @error('email') is-invalid @enderror"
                id="email" name="email"
                value="{{ old('email', isset($data) ? $data->email : '') }}" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">{{ trans('dashboard.Password') }} <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="password_confirmation">{{ trans('dashboard.Confirm Password') }} <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>
    </div>
</div>