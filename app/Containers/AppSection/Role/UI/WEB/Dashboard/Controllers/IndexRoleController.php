<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Role\Actions\ListRolesAction;
use App\Containers\AppSection\Role\Models\Role;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Yajra\DataTables\DataTables;

final class IndexRoleController extends WebController
{
    public function __invoke(ListRolesAction $action)
    {
        if (!auth()->user()->can('roles.list'))
            throw new AuthorizationException('Unauthorized');
        
        if (request()->ajax()) {
            $data = Role::where('guard_name', 'web')->latest();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<div class="btn-group"><button type="button" class="btn btn-success">' . trans('dashboard.Actions') . '</button><button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button><div class="dropdown-menu" role="menu">';
                        if (auth()->user()->can('roles.update')) {
                            $btn .= '<a class="dropdown-item" href="' . route('dashboard.roles.edit', $row->id) . '">' . trans("dashboard.Edit") . '</a>';
                        }

                        if ($row->id !== 1 && auth()->user()->can('roles.delete')) {
                            $btn .= '<a class="dropdown-item delete-popup" href="#" data-toggle="modal" data-target="#modal-default" data-url="' . route("dashboard.roles.destroy", $row->id) . '">' . trans('dashboard.delete') . '</a>';
                        }
                        $btn .= '</div></div>';
                        return $btn;
                    })
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format('Y-m-d');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Role::index');
    }
}
