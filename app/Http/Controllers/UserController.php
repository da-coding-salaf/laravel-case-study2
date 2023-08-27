<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'email|required|min:10',
            'password' => 'required'
        ]);

        $users = DB::select('select *  from user_registration  where email=?', [$request->email]);

        if($users){
            if (password_verify($request->password, $users[0]->password) == 1 ) {
                 
            $request->session()->put('email', $request->email);
            echo json_encode([
                "status"=>true,
                "message"=>"Successfully login"
               ]);  
            }else{
                   echo json_encode([
                    "status"=>false,
                    "message"=>"Incorrect login details"
                   ]); 
            }
            }else{
                echo json_encode([
                    "staus"=>false,
                    "message"=>"Unable to make request"
                   ]); 
            }
    }

    public function register(Request $request){
        $request->validate([
            'username'=>'required|unique:user_registration,username',
            'email' => 'email|required|unique:user_registration,username',
            'password' => 'required',
            'firstname'=> 'required',
            'lastname'=> 'required',
            'confirm_password'=> 'required',
            'phone_number'=> 'required',
        ]);
        $user_token=md5($request->email);
        $password=password_hash ($request->password, PASSWORD_DEFAULT);

        $users = DB::insert('INSERT INTO `user_registration`( `user_token`, `firstname`, `lastname`, `email`, `password`, `username`, `phone`) 
        VALUES (?,?,?,?,?,?,?)', [$user_token,$request->firstname,$request->lastname,$request->email,$password,$request->username,$request->phone_number]);
        
        if($users){
            echo  json_encode([
                "status"=>true,
                "message"=>"User account has successfully been created"
            ]);
        }else{
            echo  json_encode([
                "status"=>false,
                "message"=>"Unable to register user"
            ]);

        }
    }

    public function user_datas($request){
        $users = DB::select('select *  from user_registration  where email=?', [$request->session()->get('email')]);   
        return $users;
    } 


    public function websitedata($request){
        $website_info = DB::select('select *  from website_info  where id=1');   
        return $website_info;
    } 

    public function dashboard(){
        return view('dashboard.index',["site_title"=>$this->websitedata()]);
    }
    public function user_profile(Request $request){

        
        return view('dashboard.user-profile',["user_data"=>$this->user_datas($request),"website_info"=>$this->websitedata($request)]);
    }

    public function log_out(Request $request){

        $request->session()->forget('email');
        return redirect('login');
    }
}
