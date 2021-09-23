<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;
use App\User;
use App\Models\CategoryMaster;
use App\Models\SubcategoryMaster;
use Illuminate\Support\Str;

use Carbon\Carbon;

date_default_timezone_set('Asia/Kolkata');

class SubCategoryController extends Controller
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

		$subcategories = SubcategoryMaster::select('sub_category_master.*', 'category_masters.category_name as category_name', 'users.name as created_by', 'u.name as updated_by')
			->leftJoin('category_masters',  'category_masters.id', '=', 'sub_category_master.category_id')
			->leftJoin('users',  'users.id', '=', 'sub_category_master.created_by')
			->leftJoin('users as u',  'u.id', '=', 'sub_category_master.updated_by')
			->get();
		//dd($result);
		//$users = User::all();

		return view('admin.subcategories.index')->with(compact('subcategories'));
	}
	public function add()
	{
		$categories_masters = CategoryMaster::get();
		//dd($categories_masters);
		//return view('admin.subcategories.add');
		return view('admin.subcategories.add')->with(compact('categories_masters'));
	}

	public function create(Request $request)
	{
		//print_r($_POST);exit;
		$this->validate($request, [
			'category_id' => 'required',
			'sub_category_name' => 'required',

		]);
		SubcategoryMaster::create([
			'category_id' => $request->category_id,
			'sub_category_name' => $request->sub_category_name,
			'slug' => str_slug($request->input('sub_category_name') . ' ' . $request->id, '-'),
			'created_by' => Auth::id(),

		]);
		$request->session()->flash('success', 'Sub categories Create Scuccessfully');
		return redirect('/admin/subcategories');
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
		$getsubcategory = SubcategoryMaster::where('category_id', $request->category_id)->get();
		//dd($getcategory);\$subcat.
		$subcat = ' <option value="">Select Category</option>';
		foreach ($getsubcategory as $subcategory) {
			$subcat .= '<option value=' . $subcategory->id . '>' . $subcategory->sub_category_name . '</option>';
		}
		return \Response::json(['html' => $subcat]);
	}
}
