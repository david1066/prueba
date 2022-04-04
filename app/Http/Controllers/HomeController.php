<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $users = User::all();
       $tipo_documento=['1'=>'C.C.','2'=>'C.E.','3'=>'T.I.','4'=>'Pasaporte'];
   

        return view('home', compact('users','tipo_documento'));
    }
}
