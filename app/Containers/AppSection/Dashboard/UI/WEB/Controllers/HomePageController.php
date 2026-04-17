<?php

namespace App\Containers\AppSection\Dashboard\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Illuminate\Contracts\View\View;

final class HomePageController extends WebController
{
    public function __invoke(): View
    {
        return view('appSection@dashboard::home');
    }
}
