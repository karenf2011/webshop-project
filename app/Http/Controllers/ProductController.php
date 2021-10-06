<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\TimePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function Psy\debug;

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

        $searchquery = $request->input('searchquery');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        

        $products = Product::all();

        if($request->searchquery){
            
            $products = Product::search($searchquery)->get();
        }


        if($request->min_price or $request->max_price){
           
           $products = $products->whereBetween('price', [$min_price, $max_price]);
                
                $request->session()->put('max_price', $max_price);
                $request->session()->put('min_price', $min_price);
           
        }

        if($request->brand){
           
            dd($request->brand);
            foreach($request->brand as $brand) {
               
                $products->whereIn('brand_id', [$brand]);
                
                }
            
        }
  

        //BRANDS
        // if ($request->brand == 'ittala'){
            
        //     $products ->where('brand_id', 1);
        // }
        // if ($request->brand == 'ittala-ultima'){
            
        //     $products
        //         ->where('brand_id', 2);
        // }
        // if ($request->brand == 'arabia-artica'){
            
        //     $products
        //         ->where('brand_id', 3);
        // }
        // if ($request->brand == 'arabia-lumi'){
            
        //     $products
        //         ->where('brand_id', 4);
        // }
        // if ($request->brand == 'marimekko'){
            
        //     $products
        //         ->where('brand_id', 5);
        // }
    
        if($request->sort == 'price_asc'){
            
            $products = $products
                ->sortBy('price');
        }
        else if($request->sort == 'price_dcs'){
                
            $products = $products
                ->sortByDesc('price');
        }

        return view('products.index', [
            'products'      => $products,
            'brands'        => Brand::all(), 
            'categories'    => Category::all()->whereNotin('id', 1),
        ]);

    }

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
            'categories'        => Category::all()->whereNotin('id', 1),
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
  

}
