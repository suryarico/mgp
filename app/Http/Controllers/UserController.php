<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo Auth::user()->id;

        $userAddress = UserAddress::select(
            'user_address.billing_state',
            'user_address.billing_city',
            'user_address.billing_address',
            'user_address.billing_address2',
            'user_address.billing_pincode',
            'user_address.shipping_state',
            'user_address.shipping_city',
            'user_address.shipping_address',
            'user_address.shipping_address2',
            'user_address.shipping_pincode',
            'billing.state_name as billing_state',
            'shipping.state_name as shipping_state',
        )
            ->leftJoin('state_master as billing',  'billing.id', '=', 'user_address.billing_state')
            ->leftJoin('state_master as shipping',  'shipping.id', '=', 'user_address.shipping_state')
            ->where('user_id', Auth::user()->id)
            ->first();
        //dd($userAddress);
        if ($userAddress) {
            return view('users.myaccount')->with(compact('userAddress'));
        } else {
            $userAddress = [];
            return view('users.myaccount')->with(compact('userAddress'));
        }
    }
}
