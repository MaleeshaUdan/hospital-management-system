<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('login.adminlogin');
    }

    public function auth(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $admin = Auth::guard('admin')->user();
            if ($admin->role == "2") {
                if ($admin->status == "Active") {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('admin.loginform')->with('error', 'You are not an active admin');
                }
            } else {
                return redirect()->route('admin.loginform')->with('error', 'unauthorized access');
            }
        }
        return redirect()->route('admin.loginform')->with('error', 'Incorrect username or password');
    }

    public function myprofile(){
        $admin=Auth::guard('admin')->user();
        $response=[
            'name'=>$admin->name,
            'email'=>$admin->email,
            'role'=>'Admin',
            'status'=>$admin->status,
        ];

        return view('admin.myprofile')->with($response);

    }
}
