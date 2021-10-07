<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    
    public function index()
    {
        $userId = Auth::id();

        return view('profile.profile', [
            'categories'   => Category::all()->whereNotin('id', 1),
            'user'         => User::findOrFail($userId),
        ]);
    }

    public function info()
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId);

            $html = '<div class="row">';
            $html .= '<div class="col-3">';
            $html .= '<p>Voornaam:</p><p>Achternaam:</p><p>Emailadres:</p><p>Telefoonnummer:</p>';
            if (!empty($user->addresses[0])) {
                $html .='<p>Adres:</p><p>Postcode:</p><p>Plaats:</p><p>Land:</p>';
            }
            $html .= '</div>';
            $html .= '<div class="col-4">';
            $html .= '<p>' . $user->first_name . '</p>';
            $html .= '<p>' . $user->last_name . '</p>';
            $html .= '<p>' . $user->email . '</p>';
            isset($user->phone_number) ? $html .= '<p>'. $user->phone_number . '</p>' : $html .= '<p>-</p>';
            if (!empty($user->addresses[0])) {
                $html .= '<p>' . $user->addresses[0]->street_address . '</p>';
                $html .= '<p>' . $user->addresses[0]->postal_code . '</p>';
                $html .= '<p>' . $user->addresses[0]->city . '</p>';
                $html .= '<p>' . $user->addresses[0]->country . '</p>';
            }
            $html .= '</div>';
            $html .= '<div class="col-4">';
            $html .= '<a href="#" class="btn btn-light">Bewerk Info</a>';
            $html .= '<form method="POST" action="' . route('logout') . '">';
            $html .= '<input type="hidden" name="_token" value="' . csrf_token() . '" />';
            $html .= '<button type="submit" class="btn btn-light" id="logout">Logout</button></form>';
            $html .= '</div>';
            $html .= '</div>';

            return response()->json([
                'success'   => true,
                'html'      => $html,
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    public function orders()
    {
        try {
            $userId = Auth::id();
            $orders = User::findOrFail($userId)->orders;

            $html = '<div class="row">';
            $html .= '<div class="col-3">';
            $html .= '<p>Order id</p>';
            $html .= '</div>';
            $html .= '<div class="col-3">';
            $html .= '<p>Status</p>';
            $html .= '</div>';
            $html .= '<div class="col-3">';
            $html .= '<p>Totaal</p>';
            $html .= '</div>';
            $html .= '</div>';

            foreach ($orders as $order) {
                $html .= '<div class="row">';
                $html .= '<div class="col-3">';
                $html .= '<p>' . $order->id . '</p>';
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<p>' . $order->status . '</p>';
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<p>€ ' . $order->total . '</p>';
                $html .= '</div>';
                $html .= '</div>';
            }

            if (empty($orders[0])) {
                $html .= '<div>Je hebt nog geen bestellingen, kijk eens bij <a href="' . route('products.index') . '"> onze producten</a>!</div>';
            }

            return response()->json([
                'success'   => true,
                'html'      => $html,
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    public function wishlist()
    {
        try {
            $userId = Auth::id();
            $wishlist = User::findOrFail($userId)->products;

            $html = '<div class="row">';
            $html .= '<div class="col-3">';
            $html .= '<p>Brand</p>';
            $html .= '</div>';
            $html .= '<div class="col-3">';
            $html .= '<p>Name</p>';
            $html .= '</div>';
            $html .= '</div>';

            foreach ($wishlist as $favorite) {
                $html .= '<a href="' . route('products.show', $favorite->slug) . '">';
                $html .= '<div class="row">';
                $html .= '<div class="col-3">';
                $html .= '<p>' . $favorite->brand->name . ' ' . $favorite->brand->line . '</p>';
                $html .= '</div>';
                $html .= '<div class="col-3">';
                $html .= '<p>' . $favorite->name . '</p>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</a>';
            }

            if (empty($wishlist[0])) {
                $html .= '<div>Je hebt nog geen producten op je wishlist, kijk eens bij <a href="' . route('products.index') . '"> onze producten</a>!</div>';
            }

            return response()->json([
                'success'   => true,
                'html'      => $html,
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

     /**
     * Add item to wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store (Request $request)
    {
        try {
            $userId = Auth::id();
            $productId = $request->product_id;

            $wishlist = Wishlist::create([
                            'user_id'       => $userId,
                            'product_id'    => $productId,
                        ]);

            $html = '<img src="/images/passion.png" loading="lazy" width="41" alt="" class="image-13" />';

            return response()->json([
                'success'   => true,
                'html'      => $html,
                'w_id'        => $wishlist->id,
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }

    /**
     * remove item from wishlist.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function delete (Request $request)
    {
        try {
            $wishlistId = $request->w_id;

            Wishlist::where('id', $wishlistId)->delete();
            Wishlist::where('id', $wishlistId)->forceDelete();

            $html = '<img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13" />';

            return response()->json([
                'success'       => true,
                'html'          => $html,
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => $e->getMessage(),
            ]);
        }
    }
}
