<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BaseAppController extends Controller
{
    public $user;

    public function __construct(){
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
           
            view()->share('user', $this->user);
            return $next($request);
        });
    }
}
