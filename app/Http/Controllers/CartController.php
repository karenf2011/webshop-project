<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a list of the items in the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session::remove('cart');

       if (session::exists('cart')) {
            $session = session::get('cart');
            $sessionKeys = array_keys($session);
        } else {
            $session = session::put('cart', []);
        }

        // dd(session('cart'));
    //    dd($this->getTotal($session));
        
        return view('cart', [
            'products'  => Product::whereIn('id', $sessionKeys)->get(),
            'cart'      => $session,
            'total'     => $this->getTotal($session),
        ]);
    }

    /**
     * Store a new product in the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $session = session::get('cart');

            $session[$request->product_id] = 1;

            session::put('cart', $session);

            return response()->json([
                'success'   => true,
                'message'   => $session,
                'total'     => $this->getTotal($session),
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update a product quantity in the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $session = session::get('cart');

            if ($request->quantity > 0) {
                $session[$request->product_id] = $request->quantity;
                session::put('cart', $session);

                $html = '<a class="button-5 w-button adjust-quantity" p_id="' . $request->product_id . '" quantity="' . $request->quantity . '" value="-">-</a>';
                $html .= '<a class="button-6 w-button">' . $request->quantity . '</a>';
                $html .= '<a class="button-7 w-button adjust-quantity" p_id="' . $request->product_id . '" quantity="' . $request->quantity . '" value="+">+</a>';

                return response()->json([
                    'success'   => true,
                    'html'      => $html,
                    'message'   => $session,
                    'total'     => $this->getTotal($session),
                ]);
            }  
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove an item from the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $session = session::get('cart');
            unset($session[$request->product_id]);

            session::put('cart', $session);

            return response()->json([
                'success'   => true,
                'message'   => $session,
                'total'     => $this->getTotal($session),
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    public function getTotal($session)
    {
        $total = 0;
        foreach ($session as $product_id => $quantity) {
            $product = Product::findOrFail($product_id);
            $price = (double)$product->price;
            $totalPrice = $price * $quantity;
            $total += $totalPrice;
        }
        return $total;
    }
}
