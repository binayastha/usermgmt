<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct(UserContract $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function afterverify(){
        return view('auth.passwords.change_password');
    }

    public function afterverifychangepassword(UpdateUserPasswordRequest  $request){
        $user = Auth::getUser();
        if($this->user->changeUserPassword($user,$request->all())){
            Auth::logout();
            return redirect('login')->with('message','Password Changed Successfully. Please Login.');
        }
    }
}
