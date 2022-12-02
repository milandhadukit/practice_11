<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class userController extends Controller
{

    public function viewData(Request $request)
    {

        if ($request->ajax()) {

            $data = User::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()

                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('gender'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['gender'], $request->get('gender')) ? true : false;
                        });
                    }


                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['gender']), Str::lower($request->get('search')))) {
                                return true;
                            } else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            }




                            return false;
                        });
                    }
                })
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    // return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.viewdata');
    }



    public function getUsers(Request $request, User $user)
    {
        if(request()->ajax())
     {
      if(!empty($request->gender))
      {
       $data = DB::table('users')
         ->select('name', 'gender','email')
         ->where('gender', $request->gender)
         ->get();
      }
      else
      {
       $data = DB::table('users')
         ->select('name', 'gender','email')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     
     return view('user.search_filter_view');
    }
}
