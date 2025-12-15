<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(CreateUserRequest $createUserRequest){
        $validated_data = $createUserRequest->validated();
        if(Carbon::parse($validated_data['date_of_birth'])->age < 18){
            return response('You are under age!' , 422);
        }else{
            $validated_data['password'] = Hash::make($validated_data['password']);
            $user = User::create($validated_data);
            return new UserResource($user);
        }
    }
}
