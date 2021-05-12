<?php


namespace App\Repositories;


use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserContract
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserById($id)
    {
       return $this->model->findOrFail($id);
    }

    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function create($data)
    {
        $userDetail = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_invited' => isset($data['is_invited']) ? $data['is_invited'] : 0,
        );
        $user = $this->model->create($userDetail);

        if (isset($data['role'])) {
            $user->assignRole($data['role']);
        }
        return $user;
    }

    public function update(User $user, $data){
        $userDetail = array(
            'name' => $data['name'],
            'is_invited' => isset($data['is_invited']) ? $data['is_invited'] : 0,
        );
       return tap($user)->update($userDetail);  //tap() returns data, else will return 1/0
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function changeUserPassword(User $user,$data)
    {

        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}
