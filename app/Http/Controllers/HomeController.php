<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        if (session::exists('cart')) {
            session::get('cart');
        } else {
            session::put('cart', []);
        }
        
        return view('home', [
            'featured'      => Category::first()->products,
            'categories'    => Category::all()->whereNotin('id', 1),
        ]);
    }
}
