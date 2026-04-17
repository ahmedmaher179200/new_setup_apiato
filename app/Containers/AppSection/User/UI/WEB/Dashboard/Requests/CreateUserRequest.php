<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Requests;

use App\Containers\AppSection\User\Enums\Gender;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

final class CreateUserRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['nullable', 'string', 'exists:roles,name'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->can('users.create');
    }
}
