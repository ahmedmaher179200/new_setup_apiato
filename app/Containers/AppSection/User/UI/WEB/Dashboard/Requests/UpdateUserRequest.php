<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Requests;

use App\Containers\AppSection\User\Enums\Gender;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

final class UpdateUserRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [
            'name' => ['string', 'min:2', 'max:50'],
            'email' => ['email', Rule::unique('users', 'email')->ignore($this->route('id'))],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['nullable', 'string', 'exists:roles,name'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->can('users.update');
    }
}
