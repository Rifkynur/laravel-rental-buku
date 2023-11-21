<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rentlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $rentlog = Rentlog::with(['book','user'])->where('user_id',Auth::user()->id)->get();
        return view('profile',['rentlog'=>$rentlog]);
    }
    
    public function index(){
        $users = User::where(['role_id' => 2, 'status' => 'active'])->get();
        return view('users',['users' => $users]);
    }

    public function registeredUsers(){
        $registeredUsers = User::where(['status'=>'inactive','role_id'=> 2],)->get();
        return view('users-registered',['registeredUsers' => $registeredUsers]);
    }

    public function show($slug){
        $user = User::where('slug',$slug)->first();
        $rentlog = Rentlog::with(['book','user'])->where('user_id',$user->id)->get();
        return view('users-detail',['user' => $user,'rentlog' => $rentlog]);
    }

    public function approve($slug){
        $user = User::where('slug',$slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('users')->with('status','User approved Successfully');
    }

    public function delete($slug){
        $user = User::where('slug',$slug)->first();
        return view('users-delete',['user' => $user]);
    }

    public function destroy($slug){
        $user = User::where('slug',$slug)->first();
        $user->delete();
        return redirect('users')->with('status','User Banned Successfully');
    }

    public function bannedUsers(){
        $users = User::onlyTrashed()->get();
        // dd($categories);
        return view('users-banned-list',['bannedUsers'=>$users]);
    }

    public function restore($slug){
        $user = User::withTrashed()->where('slug',$slug)->first();
        // dd($category);
        $user->restore();
        return redirect('users')->with('status','Users has been restored');
    }
}
