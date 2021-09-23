<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcategoryMaster;
use App\Models\CategoryMaster;
use App\Models\Banner;
use App\Models\Product;

class HomeController extends Controller
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
    public function index()
    {
        $categories_masters = CategoryMaster::get();
        $subcategories = SubcategoryMaster::get();
        $banners = Banner::get();
        $prductsAll = Product::where('is_active', 1)->get();
        return view('home')->with(compact('subcategories', 'banners', 'prductsAll', 'categories_masters'));
    }
    public function home()
    {
        if ($this->middleware('auth')) {
            // return view('home');
            return view('users.myaccount');
        }
    }
    public function adminHome()
    {
        if ($this->middleware('auth')) {
            return view('admin.dashboard');
        }
    }
}
