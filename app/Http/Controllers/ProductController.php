<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcategoryMaster;
use App\Models\CategoryMaster;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Auth;

class ProductController extends Controller
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

    public function categoryWiseProduct(Request $request, $slug)
    {
        if ($slug != "all") {
            $where = array('slug' => $slug);
            $categories  = CategoryMaster::where($where)->first();
            $products = Product::where('category_id', $categories->id)->paginate(12);
        } else {

            $products = Product::paginate(12);
        }
        //dd($products);
        return view('products.products_list')->with(compact('products'));
    }
    public function subcategoryWiseProduct(Request $request, $slug)
    {
        if ($slug != "all") {
            $where = array('slug' => $slug);
            $Subcategory  = SubcategoryMaster::where($where)->first();
            $products = Product::where('sub_category_id', $Subcategory->id)->paginate(12);
        } else {

            $products = Product::paginate(12);
        }
        return view('products.products_list')->with(compact('products'));
    }
    public function addtoCart(Request $request)
    {
        if ($request->has('product_id')) {
            if (Auth::user()) {   // Check is user logged in
                $productData = Product::where('id', $request->product_id)->first();
                $checkCart = Cart::where('product_id', $request->product_id)
                    ->where('user_id', Auth::id())
                    ->first();
                if ($checkCart) {
                    Cart::where('product_id', $request->product_id)->where('user_id', Auth::id())
                        ->update([
                            'product_quantity' => $checkCart->product_quantity + 1,
                            'netprice' => $checkCart->netprice + $productData->product_price,
                        ]);
                } else {
                    Cart::create([
                        'product_id' => $productData->id,
                        'product_price' => $productData->product_price,
                        'netprice' => $productData->product_price,
                        'product_quantity' => 1,
                        'user_id' => Auth::id(),
                    ]);
                }

                $userCartItems = Cart::where('user_id', Auth::id())
                    ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get();
                $view = view("products.sidebarCart", compact('userCartItems'))->render();
                return \Response::json(['html' => $view, 'status' => 'success']);
            } else {
                return \Response::json(['status' => 'fail']);
            }
        }
    }
    public function wishlist(Request $request)
    {
        $productList = Wishlist::where('user_id', Auth::id())->leftJoin('products',  'products.id', '=', 'wishlists.product_id')->get();
        return view('products.wishlist')->with(compact('productList'));
    }
    public function addtoWishlist(Request $request)
    {
        if ($request->has('product_id')) {
            if (Auth::user()) {   // Check is user logged in
                $checkCart = Wishlist::where('product_id', $request->product_id)
                    ->where('user_id', Auth::id())
                    ->first();
                if ($checkCart) {
                    return \Response::json(['status' => 'success', 'msg' => 'Product already into wishlist']);
                } else {
                    Wishlist::create([
                        'product_id' => $request->product_id,
                        'user_id' => Auth::id(),
                    ]);
                    return \Response::json(['status' => 'success', 'msg' => 'Product add successfully into wishlist']);
                }
            } else {
                return \Response::json(['status' => 'fail']);
            }
        }
    }
    public function showQuickview(Request $request)
    {
        if ($request->has('product_id')) {
            $product = Product::select('products.*', 'color_master.color', 'shape_master.shape', 'size_master.size')
                ->where('products.id', $request->product_id)
                ->leftJoin('color_master',  'color_master.id', '=', 'products.color_id')
                ->leftJoin('shape_master',  'shape_master.id', '=', 'products.shape_id')
                ->leftJoin('size_master',  'size_master.id', '=', 'products.size_id')
                ->first();
            $view = view("products.quickview", compact('product'))->render();
            return \Response::json(['html' => $view, 'status' => 'success']);

            return \Response::json(['status' => 'success', 'msg' => 'Product already into wishlist']);
        } else {

            return \Response::json(['status' => 'success', 'msg' => 'Product add successfully into wishlist']);
        }
    }
}
