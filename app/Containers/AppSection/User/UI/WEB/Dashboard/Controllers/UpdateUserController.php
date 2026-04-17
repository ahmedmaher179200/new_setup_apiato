<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Requests\UpdateUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class UpdateUserController extends WebController
{
    public function __invoke(int $id, UpdateUserRequest $request, UpdateUserAction $action): RedirectResponse
    {
        $action->run($id, $request->validated());

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User updated successfully'));
    }
}
