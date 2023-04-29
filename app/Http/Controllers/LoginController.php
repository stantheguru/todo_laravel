<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function login(Request $request){

        
        
        
       
        if($request->isMethod('post')){
          
            $email = $request->input('email');
            $password = $request->input('password');
            $data = DB::select('select * from users where email=?', [$email]);
            $error = '';
            
            if (Hash::check($password, $data[0]->password)) {
                session()->put('email', $email);
                session()->put('name', $data[0]->name);
                session()->put('image', $data[0]->image);
                return redirect("/");
            } else {
                $error = 'Incorrect credentials!!';
                return view('login', ['error'=>$error]);
            }
           
        
               
          
              
                
            

        }else{
          
           
          
            $error = '';
            return view('login', ['error'=>$error]);
        }
        
    }


}
