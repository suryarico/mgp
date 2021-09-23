<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;
use App\User;
use App\Models\CategoryMaster;
use App\Models\SubcategoryMaster;
use App\Models\Product;
use App\Models\MaterialMasters;
use App\Models\ColorMaster;
use App\Models\ShapeMaster;
use App\Models\SizeMaster;
use App\Models\UseMaster;



use Carbon\Carbon;

date_default_timezone_set('Asia/Kolkata');

class ProductController extends Controller
{
	public function __construct()
	{
		//DB::enableQueryLog();
		$this->middleware('auth');
		//echo  Auth::user()->name;
		//exit;
	}


	public function index(Request $request)
	{
		// $users = Product::all();
		// dd($users);
		$products = Product::select(
			'products.*',
			'category_masters.category_name',
			's.sub_category_name as sub_category_name ',
			'users.name as created_by',
			'u.name as updated_by'
		)
			->leftJoin('category_masters',  'category_masters.id', '=', 'products.category_id')
			->leftJoin('sub_category_master as s',  's.id', '=', 'products.sub_category_id')
			->leftJoin('users',  'users.id', '=', 'products.created_by')
			->leftJoin('users as u',  'u.id', '=', 'products.updated_by')
			->get();
		//dd($product);
		//$users = User::all();

		return view('admin.products.index')->with(compact('products'));
	}
	public function add()
	{

		$categories_masters = CategoryMaster::get();
		$colorMaster = ColorMaster::get();
		$shapeMaster = ShapeMaster::get();
		$sizeMaster = SizeMaster::get();
		$useMaster = UseMaster::get();
		$materialMasters = MaterialMasters::get();
		//dd($categories_masters);
		//return view('admin.subcategories.add');
		return view('admin.products.add')->with(compact('categories_masters', 'colorMaster', 'shapeMaster', 'sizeMaster', 'useMaster', 'materialMasters'));
	}

	public function create(Request $request)
	{
		//print_r($_POST);
		//exit;
		$this->validate($request, [
			'category_id' => 'required',
			'sub_category_id' => 'required',
			'product_name' => 'required',
			'product_short_description' => 'required',
			'product_description' => 'required',
			'product_price' => 'required',
			'product_discounted_price' => 'required',
			'material_id' => 'required',
			'color_id' => 'required',
			'shape_id' => 'required',
			'size_id' => 'required',
			'use_id' => 'required',

		]);
		if ($image = $request->file('product_image')) {
			$destinationPath = 'public/products/';
			$productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
			$image->move($destinationPath, $productImage);
			$product_image = "$productImage";
		} else {
			$product_image = '';
		}
		Product::create([
			'category_id' => $request->category_id,
			'sub_category_id' => $request->sub_category_id,
			'product_name' => $request->product_name,
			'product_short_description' => $request->product_short_description,
			'product_description' => $request->product_description,
			'product_price' => $request->product_price,
			'product_discounted_price' => $request->product_discounted_price,
			'material_id' => $request->material_id,
			'color_id' => $request->color_id,
			'shape_id' => $request->shape_id,
			'size_id' => $request->size_id,
			'use_id' => $request->use_id,
			'is_featured' => $request->is_featured,
			'is_bestseller' => $request->is_bestseller,
			'is_latest' => $request->is_latest,
			'product_image' => $product_image,
			'created_by' => Auth::id(),
			'slug' => str_slug($request->input('product_name') . ' ' . $request->id, '-'),
		]);
		$request->session()->flash('success', 'Product Create Scuccessfully');
		return redirect('/admin/products');
	}

	public function edit($id)
	{
		$where = array('id' => $id);
		$subcategories  = SubcategoryMaster::where($where)->first();
		$categories_masters = CategoryMaster::get();
		return view('admin.subcategories.edit')->with(compact('subcategories', 'categories_masters'));
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'category_id' => 'required',
			'sub_category_name' => 'required',

		]);
		SubcategoryMaster::where('id', $request->id)->update([
			'category_id' => $request->category_id,
			'sub_category_name' => $request->sub_category_name,

			'updated_by' => Auth::id(),
		]);
		$request->session()->flash('success', 'subcategories Update Succefully');
		return redirect('/admin/subcategories');
	}

	public function delete(Request $request, $id)
	{

		SubcategoryMaster::where('id', $id)->delete();
		$request->session()->flash('error', 'subcategories Delete Succefully');
		return redirect('/admin/subcategories');
	}

	public function getsubcategory(Request $request)
	{
		$getsubcategory = SubcategoryMaster::select('sub_category_name')->distinct()->where('category_id', $request->category_id)->pluck("sub_category_name");
		//dd($getcategory);
		return \Response::json($getsubcategory);
	}
}
