<?php


namespace App\Contracts;


use App\Models\User;

interface UserContract
{
    public function getUserById(int $id);

    public function getAllUsers();

    public function create(array $data);

    public function update(User $user,array $data);

    public function delete(User $user);

    public function changeUserPassword(User $user,array $data);
}
