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

        $searchresult = $request->input('searchresults');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        

        $query = Product::all();

   
     
        if($request->searchresults){

            $query = Product::search($searchresult)->get();

        }

        if($request->min_price or $request->max_price){
            // This will only executed if you received any price
            // Make you you validated the min and max price properly
           $query = Product::whereBetween('price', [$min_price, $max_price])
                ->get();
                $request->session()->put('max_price', $max_price);
                $request->session()->put('min_price', $min_price);

        }

        if($request->min_price or $request->max_price && $request->price_asc){
            // This will only executed if you received any price
            // Make you you validated the min and max price properly
            $min_price_s = $request->session()->get('min_price');
            $max_price_s = $request->session()->get('max_price');
                
           $query = Product::whereBetween('price', [$min_price_s, $max_price_s])
                ->orderBy('price')
                ->get();

        }

        if($request->price_asc){
       
           $query = $query -> sortBy('price');
           
     
        }

        if($request->price_dcs){
            // This will only executed if you received any price
            // Make you you validated the min and max price properly
            $query = Product::all()
                -> sortByDesc('price');
        }

        

        $products = $query;
        return view('products.index', compact('products'));
      
    
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

    // public function search(Request $request) 
    // {
        
    //         $query = $request->searchresults; 

    //         $products = Product::search($query)->get();

    //         return view('/search/search', [
    //             'products'   => $products,
    //         ]);
    // }
}
