<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\FindUserByIdAction;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

final class EditUserController extends WebController
{
    public function __invoke(int $id, FindUserByIdAction $action): View
    {
        if (!auth()->user()->can('users.update'))
            throw new AuthorizationException('Unauthorized');

        $data = $action->run($id);

        return view('appSection@user::edit', compact('data'));
    }
}
