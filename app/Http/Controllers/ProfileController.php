<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
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
                $html .= '<div>Je hebt nog geen bestellingen, kijk eens bij <a href="{{ route(products.index) }}"> onze producten</a>!</div>';
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

    }
}
