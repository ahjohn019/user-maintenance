<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Services\UserService;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    //
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $users = $this->userService->fetchAllUsers();
            return self::successResponse(['Data' => $users]);
        } catch (\Throwable $th) {
            return self::failedResponse('Failed to get data');
        }
    }

    public function create(CreateUserRequest $request)
    {
        try {
            $payload = $request->validated();
            User::create($payload);

            return self::successResponse();
        } catch (\Throwable $th) {
            return self::failedResponse('Create User Failed');
        }
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            $payload = $request->validated();
            User::where('id', $payload['id'])->update($payload);

            return self::successResponse();
        } catch (\Throwable $th) {
            return self::failedResponse('Update User Failed');
        }
    }

    public function delete(DeleteUserRequest $request)
    {
        try {
            $payload = $request->validated();
            User::where('id', $payload['id'])->delete();

            return self::successResponse();
        } catch (\Throwable $th) {
            return self::failedResponse('Delete User Failed');
        }
    }
}
