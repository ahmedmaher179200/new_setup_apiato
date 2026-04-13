<?php

namespace App\Containers\AppSection\Authorization\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Authorization\Actions\CreateRoleAction;
use App\Containers\AppSection\Authorization\Actions\DeleteRoleAction;
use App\Containers\AppSection\Authorization\Actions\FindRoleByIdAction;
use App\Containers\AppSection\Authorization\Actions\ListRolesAction;
use App\Containers\AppSection\Authorization\Actions\UpdateRoleAction;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\UI\WEB\Dashboard\Requests\CreateRoleRequest;
use App\Containers\AppSection\Authorization\UI\WEB\Dashboard\Requests\UpdateRoleRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

final class RolesController extends WebController
{
    public function index(ListRolesAction $action)
    {
        if (Request()->ajax()) {
            $data = Role::where('guard_name','web')->latest();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn =  '<div class="btn-group"><button type="button" class="btn btn-success">'. trans('dashboard.Actions') .'</button><button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"></button><div class="dropdown-menu" role="menu">';
                            $btn .= '<a class="dropdown-item" href="' . route('dashboard.roles.edit', $row->id).'">' . trans("dashboard.Edit") . '</a>';

                            $btn .= '<a class="dropdown-item delete-popup" href="#" data-toggle="modal" data-target="#modal-default" data-url="'.route("dashboard.roles.destroy", $row->id).'">' . trans('dashboard.delete') . '</a>';
                        $btn.= '</div></div>';
                        return $btn;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at->format('Y-m-d');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Authorization::index');
    }

    public function create(): View
    {
        return view('Authorization::create');
    }

    public function store(CreateRoleRequest $request, CreateRoleAction $action): RedirectResponse
    {
        $action->run(
            $request->validated('name'),
            $request->validated('description'),
            $request->validated('display_name')
        );

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role created successfully'));
    }

    public function edit(int $id, FindRoleByIdAction $action): View
    {
        $data = $action->run($id);

        return view('Authorization::edit', compact('data'));
    }

    public function update(int $id, UpdateRoleRequest $request, UpdateRoleAction $action): RedirectResponse
    {
        $role = app(FindRoleByIdAction::class)->run($id);
        $action->run($role, $request->validated());

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role updated successfully'));
    }

    public function destroy(int $id, DeleteRoleAction $action): RedirectResponse
    {
        $action->run($id);

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role deleted successfully'));
    }
}
