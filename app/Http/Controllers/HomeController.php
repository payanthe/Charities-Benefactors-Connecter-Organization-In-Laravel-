<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $active = Auth::user()->active;
        if($active == '0'){
            return redirect('registerPart2');
        }
        elseif (Auth::user()->isAdmin()){
            return  redirect('AdminPanel');
        }

        return view('home');
    }
}
