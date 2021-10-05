<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session::exists('cart')) {
            $session = session::get('cart');
            $sessionKeys = array_keys($session);
        } else {
            $session = session::put('cart', []);
            $session = session::get('cart');
            $sessionKeys = array_keys($session);
        }

        if (isset($sessionKeys)) {
            $products = Product::whereIn('id', $sessionKeys)->get();
        } else {
            $products = [];
        }

        return view('orders.form', [
            'categories'    => Category::all()->whereNotin('id', 1),
            'user'          => Auth::user(),
            'products'      => $products,
            'cart'          => $session,
            'total'         => Product::getTotal($session),
            'action'        => route('orders.store'),
            'method'        => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = session::get('cart');
        $userId = Auth::id();

        $validatedData = $request->validate([
            'phone_number'      => ['required', 'string', 'max:255'],
            'street_address'    => ['required', 'string', 'max:255'],
            'postal_code'       => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
        ]);

        if (Auth::user()->phone_number === NULL) {
            User::where('id', $userId)->update(['phone_number' => $validatedData['phone_number']]);
        }

        if (empty(Auth::user()->addresses[0])) {
            Address::create([
                'user_id'           => $userId,
                'street_address'    => $validatedData['street_address'],
                'postal_code'       => $validatedData['postal_code'],
                'city'              => $validatedData['city'],
                'country'           => $validatedData['country'],
            ]);
        }
        
        $order = Order::create([
                    'user_id'       => $userId,
                    'status'        => 'In behandeling',
                    'subtotal'      => Product::getTotal($session),
                    'total'         => Product::getTotal($session),
                ]);

        foreach ($session as $product_id => $quantity) {
            $product = Product::findOrFail($product_id);
            OrderProducts::create([
                'order_id'      => $order->id,
                'product_id'    => $product_id,
                'name'          => $product->brand->name . ' ' . $product->brand->line . ' ' . $product->name,
                'quantity'      => $quantity,
                'price'         => $product->price,
            ]);
            $newStock = $product->stock - $quantity;
            Product::findOrFail($product_id)->update(['stock' => $newStock]);
        }

        $session = session::put('cart', []);

        return redirect()->route('orders.show', ['order' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.details', [
            'order'         => $order,
            'categories'    => Category::all()->whereNotin('id', 1),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
