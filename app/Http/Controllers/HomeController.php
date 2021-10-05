<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        if (session::exists('cart')) {
            $session = session::get('cart');
        } else {
            $session = session::put('cart', []);
        }

        return view('home', [
            'featured'      => Category::first()->products,
            'categories'    => Category::all()->whereNotin('id', 1),
        ]);
    }
}
