<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminLoginController extends Controller
{
    public function index(){
        return view('login.superadmin');
    }
}
