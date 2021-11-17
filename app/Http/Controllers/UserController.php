<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Models\user_role;
use App\Models\industrie;

use Illuminate\Support\Facades\DB;
use Session;
class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/user-list');
        }
    }

    function users()
    {
        
        $data = user::where('id', '!=', Session::get('user')['id'])->sortable()->paginate(5);

        $roleData = role::all();
        $industrieData = industrie::all();
        //var_dump($industrieData); die;

         return view('user',['users'=>$data,'roleData'=>$roleData,'industrieData'=>$industrieData]);
    }
    function filter(Request $req){

        if((!empty($req->role) && !empty($req->industrie))){
            
            $users = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('user_industries', 'users.id', '=', 'user_industries.user_id')
            ->select('users.*')
            ->where('user_roles.role_id',$req->role)
            ->orWhere('user_industries.industry_id', $req->industrie)
            ->paginate(5);  

        } elseif(!empty($req->industrie)) {
            
           
        $users = DB::table('users')
        ->join('user_industries', 'users.id', '=', 'user_industries.user_id')
        ->select('users.*')
        ->where('user_industries.industry_id',$req->industrie)
        ->paginate(5);
        
        } elseif(!empty($req->role)) {
           

           
           
            $users = user::where('id','=',function ($query) {
                $query->select('user_id')
                    ->from('user_roles')
                    ->whereColumn('user_id','users.id')
                    ->orderByDesc('users.registered_on');
            })
           ->paginate(5);

        }
           
        $roleData = role::all();
        $industrieData = industrie::all();
      
        return view('user',['users'=>$users,'roleData'=>$roleData,'industrieData'=>$industrieData]);

        

    }



}
