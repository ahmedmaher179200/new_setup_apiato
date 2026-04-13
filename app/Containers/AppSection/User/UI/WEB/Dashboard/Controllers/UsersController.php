<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Containers\AppSection\User\Actions\DeleteUserAction;
use App\Containers\AppSection\User\Actions\FindUserByIdAction;
use App\Containers\AppSection\User\Actions\ListUsersAction;
use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Requests\CreateUserRequest;
use App\Containers\AppSection\User\UI\WEB\Dashboard\Requests\UpdateUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

final class UsersController extends WebController
{
    public function index(ListUsersAction $action)
    {
        if (Request()->ajax()) {
            $data = User::latest();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn =  '<div class="btn-group"><button type="button" class="btn btn-success">'. trans('dashboard.Actions') .'</button><button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button><div class="dropdown-menu" role="menu">';
                            $btn .= '<a class="dropdown-item" href="' . route('dashboard.users.edit', $row->id).'">' . trans("dashboard.Edit") . '</a>';

                            $btn .= '<a class="dropdown-item delete-popup" href="#" data-toggle="modal" data-target="#modal-default" data-url="'.route("dashboard.users.destroy", $row->id).'">' . trans('dashboard.delete') . '</a>';                        
                        $btn.= '</div></div>';
                        return $btn;
                    })
                    ->addColumn('roles', function($row){
                        $roles = $row->getRoleNames();
                        return $roles->isNotEmpty() ? implode(', ', $roles->toArray()) : '-';
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at->format('Y-m-d');
                    })
                    ->rawColumns(['action', 'roles'])
                    ->make(true);
        }

        return view('appSection@user::index');
    }

    public function create(): View
    {
        return view('appSection@user::create');
    }

    public function store(CreateUserRequest $request, CreateUserAction $action): RedirectResponse
    {
        $action->run($request->validated());

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User created successfully'));
    }

    public function edit(int $id, FindUserByIdAction $action): View
    {
        $data = $action->run($id);

        return view('appSection@user::edit', compact('data'));
    }

    public function update(int $id, UpdateUserRequest $request, UpdateUserAction $action): RedirectResponse
    {
        $action->run($id, $request->validated());

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User updated successfully'));
    }

    public function destroy(int $id, DeleteUserAction $action): RedirectResponse
    {
        $action->run($id);

        return redirect()->route('dashboard.users.index')->with('success', trans('dashboard.User deleted successfully'));
    }

}
