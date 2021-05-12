<?php

namespace App\Http\Controllers\Backend\User;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserPasswordController extends Controller
{

    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }

    public function edit(User $user){
       return view('backend.users.changepassword')->with('user',$user);
    }

    public function update(UpdateUserPasswordRequest $request, User $user){
        $this->user->changeUserPassword($user,$request->all());
        return redirect()->route('admin.user.edit',$user)->with('message','User Password Changed successfully');
    }
}
