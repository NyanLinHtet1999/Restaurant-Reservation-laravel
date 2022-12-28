<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //edit info page
    function editInfo(){
        return view('admin.info.index');
    }
    // update
    function update(Request $req){
        $data=[
            'name'=>$req->name,
            'email'=>$req->email
        ];
        User::where('id',Auth::user()->id)->update($data);
        return back();
    }
    // redirect change password
    function changePasswordPage(){
        return view('admin.info.changePassword');
    }
    // change password
    function changePassword(Request $req){
        $this->checkValidationPassword($req);
        if(Hash::check($req->oldPassword, Auth::user()->password)){
            $data =[
                'password' => Hash::make($req->newPassword),
            ];
            User::where('id',Auth::user()->id)->update($data);
            return back()->with(['passwordChangeMessage'=>'Password has changed successfully.']);
        }else{
            return back()->with(['oldPasswordError'=>"Please fill your old password correctly!"]);
        }

    }
    //validation for password
    private function checkValidationPassword($req){
        $validationRules=[
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'comfirmedPassword'=>'required|same:newPassword'
        ];
        Validator::make($req->all(),$validationRules)->validate();

    }
}
