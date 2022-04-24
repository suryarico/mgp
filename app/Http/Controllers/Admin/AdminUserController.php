<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use Excel;
use App\Models\User;



use Carbon\Carbon;

date_default_timezone_set('Asia/Kolkata');

class AdminUserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function getEmployees(Request $request)
	{

		## Read value
		$draw = $request->get('draw');
		$start = $request->get("start");
		$rowperpage = $request->get("length"); // Rows display per page

		$columnIndex_arr = $request->get('order');
		$columnName_arr = $request->get('columns');
		$order_arr = $request->get('order');
		$search_arr = $request->get('search');

		$columnIndex = $columnIndex_arr[0]['column']; // Column index
		$columnName = $columnName_arr[$columnIndex]['data']; // Column name
		$columnSortOrder = $order_arr[0]['dir']; // asc or desc
		$searchValue = $search_arr['value']; // Search value

		// Total records
		$totalRecords = User::select('count(*) as allcount')->count();
		//$totalRecordswithFilter = Employees::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();
		$totalRecordswithFilter =  User::where('users.name', 'like', '%' . $searchValue . '%')
			->count();
		//dd($totalRecordswithFilter);
		// Fetch records
		$records = User::query();

		$records = $records->orderBy($columnName, $columnSortOrder)
			->where('users.name', 'like', '%' . $searchValue . '%')
			->select('users.*')
			->skip($start)
			->take($rowperpage)
			->get();



		$data_arr = array();

		foreach ($records as $record) {
			$id = $record->id;
			$name = $record->name;
			$email = $record->email;
			if ($record->is_admin == 1) {
				$is_admin = "ADMIN";
			} else {
				$is_admin = "USER";
			}



			$data_arr[] = array(
				"id" => '<a href="' . url("admin/users/edit", $record->id) . '" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit" style="font-size: 10px;"> <i class="fa fa-edit"></i>  </a>
				<a href="' . url("admin/users/delete", $record->id) . '" onclick="return confirm("Are you sure?")" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 10px;"> <i class="fa fa-trash" ></i>  </a>',

				"name" => $name,
				"email" => $email,
				"is_admin" => $is_admin,

			);
		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordswithFilter,
			"aaData" => $data_arr
		);

		echo json_encode($response);
		exit;
	}
	public function getEmployeesAll()
	{
		$crm_masters = User::get();
		return view('admin.users.index_new')->with(compact('crm_masters'));;
	}
	public function index(Request $request)
	{
		if (Auth::user()->emp_type == "admin") {
			//$users=User::orderby('usersName','ASC')->get();
			$users = User::leftjoin('users as creator', 'creator.id', '=', 'users.created_by')
				->leftjoin('users as updateby', 'updateby.id', '=', 'users.updated_by')
				->select('users.*', 'creator.name as Created_byName', 'updateby.name as Updated_byName')
				// ->select('users.*','creator.name as Created_byName',)
				// ->where('users.id', '=', $id)
				->get();
			//dd($result);
			//$users = User::all();

			return view('admin.users.index')->with(compact('users'));
		} else {
			$request->session()->flash('error', '! Access Denied');
			return redirect('/');
		}
	}
	public function add()
	{
		//$users=User::orderby('usersName','ASC')->get();
		//return view('clients.index');
		return view('admin.users.add');
	}

	public function create(Request $request)
	{
		//print_r($_POST);exit;
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'emp_id' => 'required|unique:users',
			'emp_type' => 'required|',
			'password' => 'required|string|min:6',

		]);
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'emp_id' => $request->emp_id,
			'emp_type' => $request->emp_type,
			'password' =>  Hash::make($request->password),
			'created_by' => Auth::id(),

		]);
		$request->session()->flash('success', 'users Create Succefully');
		return redirect('admin/users');
	}

	public function edit($id)
	{

		//$where = array('id' => $id);
		//$users  = User::where($where)->first();

		//return view('admin.users.edit')->with(compact('users'));

		$where = array('id' => $id);
		$users  = User::where($where)->first();
		return view('admin.users.edit')->with(compact('users'));
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
			'emp_id' => 'required|unique:users,emp_id,' . $request->id,
			'emp_type' => 'required|',

		]);
		User::where('id', $request->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'emp_id' => $request->emp_id,
			'emp_type' => $request->emp_type,
			'password' => Hash::make($request->password),
			'updated_by' => Auth::id(),
		]);
		$request->session()->flash('success', 'User Update Succefully');
		return redirect('admin/users');
	}

	public function delete(Request $request, $id)
	{

		User::where('id', $id)->delete();
		$request->session()->flash('error', 'users Delete Succefully');
		return redirect('admin/users');
	}


	public function updatePassword(Request $request)
	{

		$check = User::where('emp_id', $request->emp_id)->update([
			'password' =>  Hash::make($request->new_password),
		]);
		if ($check) {
			return back()->with('success', 'Password Change Successfully ');
		}
	}
	public function getUserCrm(Request $request)
	{
		$crm_masters = CrmMaster::select('crm_masters.*', 'users.name as created_by', 'u.name as updated_by')
			->leftJoin('users',  'users.id', '=', 'crm_masters.created_by')
			->leftJoin('users as u',  'u.id', '=', 'crm_masters.updated_by')
			->where('crm_masters.created_by', Auth::id())
			->get();
		$usercrm = UserCrm::where('emp_id', $request->user_id)->pluck('crm_id')->toArray();
		$uc = array_values($usercrm);
		$view = view("users.usercrmlist", compact('uc', 'crm_masters'))->render();
		return \Response::json(['html' => $view, 'status' => 'success']);
	}
	public function UserCrmUpdate(Request $request)
	{
		UserCrm::where('emp_id', $request->USerid)->delete();
		if ($request->has('crmList') && count($request->crmList) > 0) {
			foreach ($_POST['crmList'] as $crm_id) {
				$crmformFieldoption = new UserCrm();
				$crmformFieldoption->crm_id = $crm_id;
				$crmformFieldoption->emp_id = $request->USerid;
				$crmformFieldoption->save();
			}
		}

		$request->session()->flash('success', 'CRM Successfully assign to user');
		return redirect('admin/users');
	}
}
