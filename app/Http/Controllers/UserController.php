<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveAttachments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Show dashboard
    public function dashboard(){
        $leaves_count = Leave::where('status','pending')->where('user_id',auth()->user()->id)->count();
        $approved = Leave::where('status','approved')->where('user_id',auth()->user()->id)->count();
        $cancelled = Leave::where('status','cancelled')->where('user_id',auth()->user()->id)->count();
        $pending = Leave::count();
        return view('users.dashboard',['leaves_count'=> $leaves_count,'pending'=> $pending, 'approved'=> $approved, 'cancelled'=> $cancelled]);
    }
    //Show Leave Application form
    public function show_apply(){
        return view('users.apply-leave');
    }
    //Logic for storing the input
    public function store_apply(Request $request){
        $request->validate([
            'leave_type' => 'required',
            'from' => 'required|date',
            'to' => 'required|date',
            'attachments.*' => 'mimes:png,jpg,jpeg,html,txt,xls,pdf,docx,doc'
        ]);

        $apply = new Leave;
        $apply->status = 'Pending';
        $apply->employee_id = auth()->user()->employee_id;
        $apply->user_id = auth()->user()->id;
        $apply->leave_type = $request->leave_type;
        $apply->from = $request->from;
        $apply->to = $request->to;
        $apply->note = $request->note;
        $apply->save();
        $dest = '/public/files';

        foreach($request->file('attachments') as $file){
            $attach = new LeaveAttachments;
            $path = $file->store($dest);
            $attach->leave_id = $apply->id;
            $attach->attachment = str_replace('public/files/','',$path);
            $attach->save();
        }
        return redirect('/');
    }
    //Show User setting option
    public function show_setting(){
        return view('users.setting');
    }
    //Show User details update page
    public function show_user_details(){
        $gender = array('Male','Female');
        return view('users.user-details',['gender'=>$gender]);
    }
    //Store Updated user details
    public function store_user_details(Request $request){
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'department' => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        $user->middlename = $request->middlename ;
        $user->lastname = $request->lastname ;
        $user->phone_number = $request->phone_number ;
        $user->firstname = $request->firstname ;
        $user->email = $request->email ;
        $user->gender = $request->gender ;
        $user->department = $request->department ;
        $user->save();

        return redirect('/');
    }
    //Show User profile picture update page
    public function show_user_profile_picture(){
        return view('users.user-profile-picture');
    }
    //All leave history of a user
    public function all_history(){
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->paginate(1);
        return view('users.leave-history',['leaves'=> $leaves]);
    }
    //Leave details
    public function leave_details($id){
        $leave = Leave::find(Crypt::decrypt($id));
        return view('users.leave-details',['leave'=> $leave]);
    }
    //Delete Leave
    public function delete_leave($id){
        $leave = Leave::find(Crypt::decrypt($id));
        $leave->delete();
        return redirect('/');
    }
    //Show Page for Editing Leave
    public function show_edit_leave($id){
        $leave = Leave::find(Crypt::decrypt($id));
        $types = array('Casual','Sick','Study','Maternity','Sabbatical');
        return view('users.edit-leave',['types'=> $types,'leave'=>$leave]);
    }
    //Store New leave updates
    public function store_edit_leave(Request $request){
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'leave_type' => 'required'
        ]);
        $leave = Leave::find(Crypt::decrypt($request->id));
        $leave->leave_type = $request->leave_type;
        $leave->from = $request->from;
        $leave->to = $request->to;
        $leave->save();

        return redirect('/');
    }
    //Show Change Password UI
    public function change_password(){
        return view('users.change-password');
    }
    //Store changed password
    public function store_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->logout();
        return redirect('/login');
    }
    //show change picture UI
    public function change_picture(){
        return view('users.change-picture');
    }
    //Store new Profile Picture
    public function store_picture(Request $request){
        $request->validate([
            'picture' => 'mimes:png,jpg,jpeg',
        ]);
        $dir = 'storage/users/';
        unlink($dir . auth()->user()->picture);
        $dest = '/public/users';
        $path = $request->file('picture')->store($dest);
        $user = User::find(auth()->user()->id);
        $user->picture = str_replace('public/users/','',$path);
        $user->save();

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
