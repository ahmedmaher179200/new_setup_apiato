<?php

namespace App\Containers\AppSection\Dashboard\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;

final class DashboardController extends WebController
{
    public function DeletePopup(Request $request)
    {
        return [
            'title' => trans('dashboard.Alert'),
            'body'  => view('Dashboard::partials.delete_confirmation')->with([
                'url' => $request->delete_url,
            ])->render(),
        ];
    }
}
