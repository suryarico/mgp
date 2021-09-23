<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;
use App\Models\CategoryMaster;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;

date_default_timezone_set('Asia/Kolkata');

class CategoryController extends Controller
{
	public function __construct()
	{
		//DB::enableQueryLog();
		$this->middleware('auth');
	}


	public function index(Request $request)
	{

		$categories_masters = CategoryMaster::select('category_masters.*', 'users.name as created_by', 'u.name as updated_by')
			->leftJoin('users',  'users.id', '=', 'category_masters.created_by')
			->leftJoin('users as u',  'u.id', '=', 'category_masters.updated_by')
			->get();
		//dd($result);
		//$users = User::all();

		return view('admin.categories_masters.index')->with(compact('categories_masters'));
	}
	public function add()
	{
		//$users=User::orderby('usersName','ASC')->get();
		//return view('clients.index');
		return view('admin.categories_masters.add');
	}

	public function create(Request $request)
	{
		//print_r($_POST);exit;
		$this->validate($request, [
			'category_name' => 'required|string',

		]);
		CategoryMaster::create([
			'category_name' => $request->category_name,
			'slug' => str_slug($request->input('category_name') . ' ' . $request->id, '-'),
			'created_by' => Auth::id(),

		]);
		$request->session()->flash('success', 'categories Create Succefully');
		return redirect('/admin/categories');
	}

	public function edit($id)
	{
		$where = array('id' => $id);
		$categories  = CategoryMaster::where($where)->first();
		//dd($categories);
		return view('/admin/categories_masters.edit')->with(compact('categories'));
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'category_name' => 'required|string',

		]);
		CategoryMaster::where('id', $request->id)->update([
			'category_name' => $request->category_name,

			'updated_by' => Auth::id(),
		]);
		$request->session()->flash('success', 'categories Update Succefully');
		return redirect('/admin/categories');
	}

	public function delete(Request $request, $id)
	{

		CategoryMaster::where('id', $id)->delete();
		$request->session()->flash('error', 'categories Delete Succefully');
		return redirect('/admin/categories');
	}
}
