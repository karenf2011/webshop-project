<?php

namespace App\Http\Controllers;

use App\Http\Resources\product as ResourcesProduct;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        // dd($request);
        $request->validate([
            'query' => 'required'
        ]);
    

        $query = $request->input('query');
        
        $products = Product::where('name', 'LIKE', '%$query%');
        
        return view('search/search', [
            'products'  => $products,
        ]);
    }
}
