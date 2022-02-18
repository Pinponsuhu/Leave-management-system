<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Leave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admins');
    }
    public function dashboard(){
        $users = Leave::get();
        $active_count = 0;
        $dateee = Carbon::now()->format('Y-m-d');
        $active_count = Leave::where('from', '<=', $dateee)
        ->where('to', '>=', $dateee)
        ->where('status','Approved')
        ->count();
        $user_count = User::count();
        $cancel_count = Leave::where('status','Cancelled')->count();
        $pend_count = Leave::where('status','Pending')->count();
        return view('admin.dashboard',['user_count'=> $user_count,'cancel_count'=> $cancel_count,'pend_count'=> $pend_count,'active_count'=> $active_count]);
    }
    public function all_employee(){
        $users = User::orderBy('firstname', 'ASC')->get();
        return view('admin.all-employee',['users'=>$users]);
    }
    public function new_employee(){
        return view('admin.new-employee');
    }
    public function store_new_employee(Request $request){
        $request->validate([
            'picture' => 'mimes:png,jpg,jpeg|required',
            'employee_id' => 'required',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'middlename' => 'required|alpha',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'department' => 'required',
            'gender' => 'required',
        ]);

        $dest = '/public/users';
        $path = $request->file('picture')->store($dest);
        $user = new User;
        $user->picture = str_replace('public/users/','',$path);
        $user->middlename = $request->middlename ;
        $user->lastname = $request->lastname ;
        $user->phone_number = $request->phone_number ;
        $user->firstname = $request->firstname ;
        $user->email = $request->email ;
        $user->gender = $request->gender ;
        $user->department = $request->department ;
        $user->employee_id = $request->employee_id ;
        $user->password = Hash::make('p@ssword1') ;
        $user->save();

        return redirect('admin/dashboard');
    }
    //Show all new leave
    public function leave_request(){
        $leaves = Leave::where('status','Pending')->get();
        return view('admin.leave-request',['leaves'=> $leaves]);
    }
    //Show Add admin page
    public function show_admin(){
        return view('admin.add-admin');
    }
    //Store new admin
    public function store_admin(Request $request){
        $request->validate([
            'fullname' => 'required',
            'admin_level' => 'required',
            'username' => 'required|alpha_num',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'password' => 'required|confirmed',
            'picture' => 'required|mimes:png,jpg,jpeg'
        ]);
        $admin = new Admin;
        $dest = 'public/admins';
        $path = $request->file('picture')->store($dest);
        $admin->fullname = $request->fullname;
        $admin->username = $request->username;
        $admin->phone_number = $request->phone_number;
        $admin->email = $request->email;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->admin_level = $request->admin_level;
        $admin->picture = str_replace('public/admins/','',$path);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect('/admin/dashboard');
    }
    //Show Admin Settings
    public function setting(){
        return view('admin.setting');
    }
    //Leave Details
    public function leave_details($id){
        $status = array('Pending','Cancelled','Approved');
        $leave = Leave::find(Crypt::decrypt($id));
        $user = User::select('firstname','middlename','lastname')->where('id',$leave->user_id)->first();
        return view('admin.leave-details',['leave'=> $leave,'status'=>$status,'user'=> $user]);
    }
    //Update status
    public function update_status(Request $request){
        $leave = Leave::find(Crypt::decrypt($request->id));
        $leave->status = $request->status;
        $leave->remark = $request->remark;
        $leave->approved_by = auth()->guard('admin')->user()->fullname;
        $leave->approved_on = Carbon::now()->format('Y-m-d');
        $leave->save();
        return redirect()->back();
    }
    //Active leave
    public function active_leave(){
        $dateee = Carbon::now()->format('Y-m-d');
        $leaves = Leave::where('from', '<=', $dateee)
        ->where('to', '>=', $dateee)
        ->where('status','Approved')
        ->get();

        return view('admin.active-count',['leaves'=> $leaves]);
    }
    //Show Admin details
    public function update_admin_details(){
        return view('admin.admin-details');
    }
    //Store Admin details
    public function store_admin_details(Request $request){
        $request->validate([
            'fullname' => 'required',
            'admin_level' => 'required',
            'username' => 'required|alpha_num',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'date_of_birth' => 'required|date'
        ]);
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $admin->fullname = $request->fullname;
        $admin->username = $request->username;
        $admin->phone_number = $request->phone_number;
        $admin->email = $request->email;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->admin_level = $request->admin_level;
        $admin->save();

        return redirect('/admin/dashboard');
    }
    //Show change picture page
    public function show_picture(){
        return view('admin.change-picture');
    }
    //store picture
    public function store_picture(Request $request){
        $request->validate([
            'picture' => 'mimes:png,jpg,jpeg',
        ]);
        $dir = 'storage/admins/';
        unlink($dir . auth()->guard('admin')->user()->picture);
        $dest = '/public/admins';
        $path = $request->file('picture')->store($dest);
        $user = Admin::find(auth()->guard('admin')->user()->id);
        $user->picture = str_replace('public/admins/','',$path);
        $user->save();

        return redirect('/admin/dashboard');
    }
    //Show change password page
    public function change_password(){
        return view('admin.change-password');
    }
    public function store_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = Admin::find(auth()->guard('admin')->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->logout();
        return redirect('/admin/login');
    }
    //logout logic
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}
