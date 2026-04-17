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

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>{{ trans('dashboard.Permissions') }}</label>
                <div style="max-height: 600px; overflow-y: auto;">
                    @php
                        // Group permissions by model (the part before the dot)
                        $groupedPermissions = [];
                        foreach ($permissions as $permission) {
                            $modelName = explode('.', $permission->name)[0];
                            if (!isset($groupedPermissions[$modelName])) {
                                $groupedPermissions[$modelName] = [];
                            }
                            $groupedPermissions[$modelName][] = $permission;
                        }
                    @endphp

                    <div class="row">
                        @forelse($groupedPermissions as $model => $modelPermissions)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <div class="card-header p-0">
                                        <button class="btn btn-link w-100 text-left p-3" type="button" data-toggle="collapse" data-target="#permission-{{ $model }}" aria-expanded="true">
                                            <strong>{{ ucfirst($model) }}</strong>
                                            <i class="fas fa-chevron-down float-right"></i>
                                        </button>
                                    </div>
                                    <div id="permission-{{ $model }}" class="collapse show">
                                        <div class="card-body p-3">
                                            @foreach($modelPermissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox"
                                                            class="form-check-input"
                                                            id="permission_{{ $permission->id }}"
                                                            name="permissions[]"
                                                            value="{{ $permission->id }}"
                                                            @if(isset($data) && $data->permissions->contains('id', $permission->id)) checked @endif
                                                            @if(old('permissions') && in_array($permission->id, old('permissions'))) checked @endif>
                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        <small>{{ trans("dashboard.{$permission->name}") ?? $permission->name }}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted">{{ trans('dashboard.No permissions available') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                @error('permissions')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
                @error('permissions.*')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
