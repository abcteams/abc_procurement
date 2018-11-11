<?php

namespace App\Http\Controllers;

use App\important\checkMenu;
use Illuminate\Http\Request;
use App\important\checkAuth;

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
    public function index()
    {
        $checkAuth  =   new checkAuth();
        $GML        =   $checkAuth->checkGML();

        $checkMenu  =   new checkMenu();
        $menu       =   $checkMenu->Menu('','');
        return view('home')->with('menu',$menu);
    }
}
