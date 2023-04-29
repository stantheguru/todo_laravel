<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request){

        
        
        
       
        if($request->isMethod('post')){
            $task_name = $request->input('task_name');
       
        $date = date("Y-m-d");
        $email  = session()->get('email');
        
               
                DB::table('tasks')->insert([
                    'task_name' => $task_name,
                    'email'=>$email,
                    'date'=>$date,
                    'status'=>'active'
                    
    
                ]);
                
          
              
                return redirect("/");
            

        }else{
            $user_name = session()->get('email');
            if($user_name !=""){
                $all_tasks = DB::select("select * from tasks where email = ?", [$user_name]);
            $active_tasks = DB::select("select * from tasks where status='active' and email = ?", [$user_name]);
            $completed_tasks = DB::select("select * from tasks where status='completed' and email =?", [$user_name]);
            $data = ['all_tasks'=>$all_tasks,
                    'active_tasks'=>$active_tasks,
                    'completed_tasks'=>$completed_tasks,
                    'name'=>session()->get('name'),
                    'image'=>session()->get('image')
                
                ];
          
            return view('welcome', $data);
            }else{
                return redirect("/login");
            }
            
        }
        
    }

    public function update_status(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $new_status = 'completed';
        if ($status =='active'){
            $new_status = 'completed';
        }else{
            $new_status = 'active';
        }
        DB::update("update tasks set status=? where id=?", [$new_status,$id]);
        
        return redirect("/");
    }

    public function logout(){
        session()->forget('email');
        session()->forget('name');
        session()->forget('image');
        return redirect("/login");
        
    }
}
