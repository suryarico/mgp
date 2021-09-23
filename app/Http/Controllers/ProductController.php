<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubcategoryMaster;
use App\Models\CategoryMaster;
use App\Models\Banner;
use App\Models\Product;

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
            $products = Product::where('category_id', $categories->id)->paginate(1);
        } else {

            $products = Product::paginate(1);
        }

        //dd($products);

        return view('products.products_list')->with(compact('products'));
    }
    public function subcategoryWiseProduct(Request $request, $slug)
    {
        if ($slug != "all") {
            $where = array('slug' => $slug);
            $Subcategory  = SubcategoryMaster::where($where)->first();
            $products = Product::where('sub_category_id', $Subcategory->id)->paginate(1);
        } else {

            $products = Product::paginate(1);
        }
        return view('products.products_list')->with(compact('products'));
    }
}
