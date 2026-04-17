<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\User\Actions\ListUsersAction;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Yajra\DataTables\DataTables;

final class IndexUserController extends WebController
{
    public function __invoke(ListUsersAction $action)
    {
        if (!auth()->user()->can('users.list'))
            throw new AuthorizationException('Unauthorized');

        if (request()->ajax()) {
            $data = User::latest();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="btn-group"><button type="button" class="btn btn-success">' . trans('dashboard.Actions') . '</button><button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button><div class="dropdown-menu" role="menu">';

                        if (auth()->user()->can('users.update')) {
                            $btn .= '<a class="dropdown-item" href="' . route('dashboard.users.edit', $row->id) . '">' . trans("dashboard.Edit") . '</a>';
                        }

                        if ($row->id !== 1 && auth()->user()->can('users.delete')) {
                            $btn .= '<a class="dropdown-item delete-popup" href="#" data-toggle="modal" data-target="#modal-default" data-url="' . route("dashboard.users.destroy", $row->id) . '">' . trans('dashboard.delete') . '</a>';
                        }
                        $btn .= '</div></div>';
                        return $btn;
                    })
                    ->addColumn('roles', function ($row) {
                        $roles = $row->getRoleNames();
                        return $roles->isNotEmpty() ? implode(', ', $roles->toArray()) : '-';
                    })
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format('Y-m-d');
                    })
                    ->rawColumns(['action', 'roles'])
                    ->make(true);
        }

        return view('appSection@user::index');
    }
}
