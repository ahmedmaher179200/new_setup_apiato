<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Requests\CreateUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class StoreUserController extends WebController
{
    public function __invoke(CreateUserRequest $request, CreateUserAction $action): RedirectResponse
    {
        $action->run($request->validated());

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User created successfully'));
    }
}
