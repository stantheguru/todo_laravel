<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function register(Request $request){

        
        
        
       
        if($request->isMethod('post')){
            $fname = $request->input('firstName');
            $lname = $request->input('lastName');
            $email = $request->input('email');
            $password = bcrypt($request->input('password'));
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->store('public/images');
            $imageUrl = asset('storage/' . str_replace('public', '',$imagePath));
           

            
       
            $created = date("Y-m-d");
           
        
                DB::table('users')->insert([
                    'name' => $fname.' '.$lname,
                    'email'=>$email,
                    'image'=>$imageUrl,
                    'created_at'=>$created,
                    'password'=>$password
                   
                    
    
                ]);
                
          
              
                return redirect("/login");
            

        }else{
          
           
          
            return view('register');
        }
        
    }


}
