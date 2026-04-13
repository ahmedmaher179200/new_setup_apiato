<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Dashboard\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

final class UpdateRoleRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50', Rule::unique('roles', 'name')->ignore($this->id)],
            'display_name' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
