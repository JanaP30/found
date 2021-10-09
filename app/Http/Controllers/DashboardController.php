<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends BaseAppController
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
