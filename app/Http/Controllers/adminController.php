<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    //
    public function userView(){

        $data['allData'] = User::latest('id')->get();
        return view('admin.view_user',$data);
    }

    public function userAdd()
    {
        return view('admin.adduser');
    }

    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);
         $user = new User();   
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender=$request->gender;
        $user->password = bcrypt($request->password);
        $user->save();
        return view('home');

    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
       
        $user->status = $request->status;
        
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
    }







    public function userEdit($id){
        $user = User::find($id);
        return view('admin.edit_user',compact('user'));
    }

    public function userUpdate(Request $request, $id){
        // $validatedData = $request->validate([
        //     'email' => 'required|unique:users',
        //     'name' => 'required',
        //]);

        $user = User::find($id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=$request->password;
        $user->save();
        return redirect()->route('admin.userview');
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.userview');
    }

}
