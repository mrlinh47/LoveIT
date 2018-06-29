<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Response;
use App\Models\User;
use Auth;
use DateTime;
class UserController extends Controller
{
    public function getAdd(){
    	return view('admin.module.user.add');
    }
    public function postAdd(UserRequest $request){
    	$user = new User;
    	$user->fullname = $request->fullname;
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->address = $request->address;
    	$user->level = $request->level;
        $user->status = $request->status;
    	$user->created_at = new DateTime();
    	$user->save();
            
    	return redirect()->route('getListUser')->with(['flash_type'=>'success','flash_msg' => 'User added success']);
    }

    public function getListUser(){
        $data = User::select('id','fullname','username','email','address','level','status')->get();
      
        return view('admin.module.user.list',['data' => $data]);
    }

    public function getDelete($id){
        $user_current = Auth::user()->id;
        //echo $user_current;
        $user_delete = User::find($id);
        //echo $user_delete['id'];
        if(($id==1) || ($user_current !=1 && $user_delete['level'] == 1) ){
            return redirect()->route('getListUser')->with(['flash_type'=>'danger','flash_msg' => 'You don\'t have permision to delete this user! ' ]);
        }else{
            $user_delete->delete($id);
            return redirect()->route('getListUser')->with(['flash_type'=>'success','flash_msg' => 'You deleted success this user' ]);
        }
    }

    public function getEdit($id){
        $user = User::findOrFail($id)->toArray();
        if((Auth::user()->id != 1) && ($id == 1 || ($user['level'] == 1 && (Auth::user()->id != $id)))){
            return redirect()->route('getListUser')->with(['flash_type'=>'danger','flash_msg' => 'You don\'t have permision to edit this user! ' ]);
        }else{
            return view('admin.module.user.edit',['user'=>$user]);
        }
        
    }
    public function postEdit(Request $request, $id){
       $user = User::find($id);
       //print_r($user);
       if($request->password){
            $this->validate($request,
            [
                'repassword' => 'same:password'
            ],
            [
                'repassword.same' => 'Re-Password is not the same Password'
            ]
       );
           $user->password = bcrypt($request->password); 
       }
       if($request->level){
            $user->level = $request->level;
       }
       if($request->status){
            $user->status = $request->status;
       }
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->address = $request->address;
        
        
        $user->updated_at = new DateTime(); 
        $user->save();
        return redirect()->route('getListUser')->with(['flash_type'=>'success','flash_msg' => 'User edit success']);
    }

    public function editStatus($id){
        if(request()->ajax()){
            $id = request()->get('id');
            $active='';
            //echo $id;
            $user = User::find($id);
            if($user->status == 0){
                $user->status = 1;
                $active=1;

            }else{
                $user->status = 0;
                $active=0;
            }
            
            $user->save();
            return Response::json(array('active'=>$active));
        }
    }
}
