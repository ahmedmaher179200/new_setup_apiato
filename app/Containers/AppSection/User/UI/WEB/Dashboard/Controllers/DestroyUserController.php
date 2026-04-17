<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\DeleteUserAction;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

final class DestroyUserController extends WebController
{
    public function __invoke(int $id, DeleteUserAction $action): RedirectResponse
    {
        if (!auth()->user()->can('users.delete'))
            throw new AuthorizationException('Unauthorized');

        $action->run($id);

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User deleted successfully'));
    }
}
