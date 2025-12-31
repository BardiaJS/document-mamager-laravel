<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SupportController extends Controller
{
    public function ban_user(User $user){
        $user->is_banned = 1;
        $user->save();
    }
    public function unban_user(User $user){
        $user->is_banned = 0;
        $user->save();
    }
}
