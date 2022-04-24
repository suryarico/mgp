<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcategoryMaster;
use App\Models\CategoryMaster;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\UserAddress;
use App\Models\UserShippingAddress;
use App\Models\UserBillingAddress;
use App\Models\State;
use Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function cart(Request $request)
    {
        $cart_list = Cart::where('user_id', Auth::id())
            ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();

        return view('orders.cart')->with(compact('cart_list'));
    }
    public function cartUpdate(Request $request)
    {
        if (Auth::user()) {
            //dd($request->all());
            foreach ($_POST['product_id'] as $key => $product_id) {
                $productData = Product::where('id', $product_id)->first();
                Cart::where('product_id', $product_id)->where('user_id', Auth::id())
                    ->update([
                        'product_quantity' => $_POST['product_quantity'][$key],
                        'netprice' => $_POST['product_quantity'][$key] * $productData->product_price,
                    ]);
            }
        }
        return redirect('/cart');
    }
    public function checkOut(Request $request)
    {
        if (Auth::user()) {
            $cart_list = Cart::where('user_id', Auth::id())
                ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();
            $userAddress = UserShippingAddress::where('user_id', Auth::user()->id)
                ->first();
            $userBillingAddress = UserBillingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_billing_address.billing_state')->get(['user_billing_address.*', 'state_master.state_name']);

            $userShippingAddress = UserShippingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_shipping_address.shipping_state')->get(['user_shipping_address.*', 'state_master.state_name']);
            //dd($userBillingAddress);
            $perkg = State::where('id', $userAddress->shipping_state)->first();
            $state_list = State::all();
            return view('orders.checkout')->with(compact('cart_list', 'userAddress', 'state_list', 'perkg', 'userBillingAddress', 'userShippingAddress'));
        } else {
            return redirect('/login');
        }
    }
    public function getCheckoutItems(Request $request)
    {
        if ($request->stateType == 0) {
            if (Auth::user()) {
                $cart_list = Cart::where('user_id', Auth::id())
                    ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();
                $userAddress = UserShippingAddress::where('user_id', Auth::user()->id)
                    ->first();
                $userBillingAddress = UserBillingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_billing_address.billing_state')->get(['user_billing_address.*', 'state_master.state_name']);

                $userShippingAddress = UserShippingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_shipping_address.shipping_state')->get(['user_shipping_address.*', 'state_master.state_name']);
                //dd($userBillingAddress);
                $perkg = State::where('id', $userAddress->shipping_state)->first();
                $state_list = State::all();
                $view = view('orders.useritemCheckout')->with(compact('cart_list', 'userAddress', 'state_list', 'perkg', 'userBillingAddress', 'userShippingAddress'))->render();
            } else {
                return redirect('/login');
            }
            // $view = view("orders.useritemCheckout", compact('userCartItems'))->render();

        } else {
            $cart_list = Cart::where('user_id', Auth::id())
                ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();
            $userAddress = UserShippingAddress::where('user_id', Auth::user()->id)
                ->first();
            $userBillingAddress = UserBillingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_billing_address.billing_state')->get(['user_billing_address.*', 'state_master.state_name']);

            $userShippingAddress = UserShippingAddress::where('user_id', Auth::user()->id)->leftJoin('state_master',  'state_master.id', '=', 'user_shipping_address.shipping_state')->get(['user_shipping_address.*', 'state_master.state_name']);
            UserShippingAddress::where(['user_id' => Auth::user()->id])->update([
                'is_default' => 0,
            ]);
            UserShippingAddress::where(['shipping_state' => $request->stateType, 'user_id' => Auth::user()->id])->update([
                'is_default' => 1,
            ]);
            //dd($userBillingAddress);
            $perkg = State::where('id', $request->stateType)->first();
            $state_list = State::all();
            $view = view('orders.useritemCheckout')->with(compact('cart_list', 'userAddress', 'state_list', 'perkg', 'userBillingAddress', 'userShippingAddress'))->render();
        }
        return \Response::json(['html' => $view, 'status' => 'success']);
    }
    public function placeOrder(Request $request)
    {
        if (Auth::user()) {
            $cart_list = Cart::where('user_id', Auth::id())
                ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();
        } else {
            return redirect('/login');
        }
        return \Response::json(['status' => 'success', 'msg' => 'Order Placed Successfully']);
    }
}
