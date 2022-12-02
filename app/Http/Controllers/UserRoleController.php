<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    //
    public function roleView()
    {


        $usershow = User::latest('id')->get();
        return view('admin.userrole', compact('usershow'));
    }
}
