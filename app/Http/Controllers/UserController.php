<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bootstrap\HandleExceptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function edit($id)
    {  
        $user=User::find($id);
        return view('auth/edit',compact('user'));    
    } 

     public function editpwd($id)
    {  
        $user=User::find($id);
        return view('auth/changepwd',compact('user'));    
    } 

    public function updatepwd(Request $request)
    { 
        $this->validate($request, [
            'current_password'          => 'required',
            'password'              => 'required|min:8',
            'new_confirm_password' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password , $hashedPassword)) {
            if ($request->password == $request->new_confirm_password) {
                if (Hash::check($request->password , $hashedPassword)) {
                     $request->session()->flash('error_message','Your new password cannot be same with the old password!');
                        return redirect()->back();
                   
                }else{
                    
                     $users = User::find(Auth::user()->id);
                    $users->password = bcrypt($request->password);
                    $request->session()->flash('message','Password updated successfully');
                    $users->save();
                    return redirect()->route('home');
                }
            }
            else{
                $request->session()->flash('error_message','Your new password and confirm password do not match!');
                return redirect()->back();
            } 
        }
        else{
            $request->session()->flash('error_message','Old password does not match!');
            return redirect()->back();
        }
    }

        // $users = DB::table('users')->where('id',$id)->select('password')->get();
        // $this->validate($request, [
        //     'current_password'          => 'required',
        //     'password'              => 'required|min:4',
        //     'new_confirm_password' => 'required|same:password'
        // ]);
        //  if (Hash::check($users,"current_password")) {

        //     $user->password = Hash::make(Input::get('password'));
        //     $request->session()->flash('success_message', 'Profile update successfully');
        //     return redirect()->route('home');
        //     $user->save();
        // }else
        // $request->session()->flash('error_message', 'Your new password and current password do not match.');
        //  return redirect()->back();
    //}

    public function update(Request $request)
    { 
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
            ]);
        $request->session()->flash('success_message', 'Profile update successfully');
        return redirect()->route('home');
    }
}