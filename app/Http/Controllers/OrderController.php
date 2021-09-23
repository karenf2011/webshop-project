<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
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
        }

        return view('orders/form', [
            'products'  => Product::whereIn('id', $sessionKeys)->get(),
            'cart'      => $session,
            'total'     => Product::getTotal($session),
            'action'    => route('orders.store'),
            'method'    => 'POST',
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

        $user = User::create([
                    'role_id'           => 2,
                    'first_name'        => $request->input('first_name'),
                    'last_name'         => $request->input('last_name'),
                    'email'             => $request->input('email'),
                    'email_verified_at' => now(),
                    'password'          => bcrypt('wachtwoord123'),
                    'phone_number'      => $request->input('phone_number'),
                    'remember_token'    => Str::random(10),
                ]);

        Address::create([
            'user_id'           => $user->id,
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'street_address'    => $request->input('street_address'),
            'postal_code'       => $request->input('postal_code'),
            'city'              => $request->input('city'),
            'country'           => $request->input('country'),
        ]);
        
        $order = Order::create([
                    'user_id'       => $user->id,
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
        return view('orders/details', [
            'order'     => $order,

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
