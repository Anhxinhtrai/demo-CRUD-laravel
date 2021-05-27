<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('customer')->get();
        return view('users.list', compact('users'));
    }

    public function deteleUser($id)
    {
        DB::table('customer')->where('id', '=', $id)->delete();
        return redirect(route('userList'));
    }

    public function showCreateUserForm()
    {
        return view('users.createUserForm');
    }

    public function createUser(Request $request)
    {
        DB::table('customer')->insert([
           'name'=>$request->username,
            'dob'=>$request->dob,
            'email'=>$request->email
        ]);
        return redirect(route('userList'));
    }

    public function showEditUserForm($id)
    {
       $user = DB::table('customer')->where('id','=',$id)->get();
        return view('users.editUserForm',compact('user'));
    }

    public function editUser(Request $request)
    {
        DB::table('customer')->where('id',$request['id'])->update([
            'name'=> $request['username'],
            'dob'=>$request['dob'],
            'email'=>$request['email']
        ]);
        return redirect(route('userList'));
    }
}
