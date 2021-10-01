<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TimePeriod;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $min = $request->input('min-price');
        $max = $request->input('max-price');

        if ($request->fullUrl() == 'http://127.0.0.1:8000/products?sort=price_asc') {
            return view('products.index', [
                'products'  => Product::all()
                -> sortBy('price')
            ]);
        }
        
        elseif ($request->fullUrl() == 'http://127.0.0.1:8000/products?sort=price_dcs') {
            return view('products.index', [
                'products'  => Product::all()
                -> sortByDesc('price')
            ]);
        }
    
        elseif ($request->fullUrl() == 'http://127.0.0.1:8000/products?sort=newest') {
            return view('products.index', [
                'products'  => Product::all()
                -> sortByDesc('created_at')
            ]);
        }
   
        elseif ($request->has('min-price'))  {
            return view('products.index', [
                'products'  => Product::whereBetween('price', [$min, $max])
                ->get()
            ]);
           
        }

        else{
            return view('products.index', [
                'products'  => Product::paginate(15)
            ]);   
        }
        
    }

    // public function filterProducts(Request $request)

    // {
    //     $min = $request->input('min-price');
    //     $max = $request->input('max-price');

    //     return view('products.index', [
    //         'products'  =>   Product::whereBetween('price', [$min, $max])
    //         ->get()
    //     ]);   
     
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        // dd(session('cart'));
        if (session::exists('cart')) {
            $session = session::get('cart');
        } else {
            $session = session::put('cart', []);
        }

        $timePeriod= TimePeriod::findOrFail($product->time_period_id);

        return view('products.show', [
            'product'           => $product,
            'cart'              => $session,
            'relatedProducts'   => $timePeriod->products->take(3),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search(Request $request) 
    {
        
            $query = $request->searchresults; 

            $products = Product::search($query)->get();

            return view('/search/search', [
                'products'   => $products,
            ]);
    }
}
