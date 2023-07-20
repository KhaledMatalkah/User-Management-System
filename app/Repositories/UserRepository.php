<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    public function index($id)
    {
        $user = User::find($id);
        if(!$user){
            return null;
        }else{
            return $user;
        }
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('f_name', 'LIKE', "%$search%")
            ->orWhere('l_name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->get();

        return $users;
    }
}
