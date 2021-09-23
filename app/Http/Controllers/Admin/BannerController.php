<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;
use App\Models\CategoryMaster;
use App\Models\Banner;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;

date_default_timezone_set('Asia/Kolkata');

class BannerController extends Controller
{
	public function __construct()
	{
		//DB::enableQueryLog();
		$this->middleware('auth');
	}


	public function index(Request $request)
	{

		$banners_all = Banner::get();
		//dd($result);
		//$users = User::all();

		return view('admin.banners.index')->with(compact('banners_all'));
	}
	public function add()
	{
		//$users=User::orderby('usersName','ASC')->get();
		//return view('clients.index');
		return view('admin.banners.add');
	}

	public function create(Request $request)
	{
		//print_r($_POST);exit;
		$this->validate($request, [
			'title' => 'required|string',

		]);
		$input = $request->all();
		if ($image = $request->file('banner_image')) {
			$destinationPath = 'public/banners/';
			$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
			$image->move($destinationPath, $profileImage);
			$input['banner_image'] = "$profileImage";
		}
		Banner::create($input);

		$request->session()->flash('success', 'Banner Create Successfully');
		return redirect('/admin/banners');
	}

	public function edit($id)
	{
		$where = array('id' => $id);
		$banner  = Banner::where($where)->first();
		//dd($categories);
		return view('/admin/banners.edit')->with(compact('banner'));
	}

	public function update(Request $request, Banner $banner)
	{
		// print_r($_FILES);
		// print_r($_POST);
		// exit;
		$this->validate($request, [
			'title' => 'required|string',

		]);
		$input = $request->all();
		if ($image = $request->file('banner_image')) {
			$destinationPath = 'public/banners/';
			$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
			$image->move($destinationPath, $profileImage);
			$input['banner_image'] = "$profileImage";
		} else {
			unset($input['banner_image']);
		}
		//$banner->update($input);
		unset($input['_token']);
		Banner::where('id', $request->id)->update($input);
		$request->session()->flash('success', 'Banner Update Succefully');
		return redirect('/admin/banners');
	}

	public function delete(Request $request, $id)
	{

		Banner::where('id', $id)->delete();
		$request->session()->flash('error', 'Banner Delete Succefully');
		return redirect('/admin/banners');
	}
}
