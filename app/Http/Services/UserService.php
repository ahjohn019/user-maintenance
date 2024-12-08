<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function fetchAllUsers()
    {
        $users = User::get();

        foreach ($users as $user) {
            $data[] = [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "phone" => $user->phone,
                "password" => $user->password
            ];
        }

        return $users;
    }
}
