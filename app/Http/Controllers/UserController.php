<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index($id)
    {
        $user = $this->UserRepository->index($id);
        if ($user == null) {
            return abort(404);
        } else {
            return view('users.userProfile', compact('user'));
        }

    }


    public function search(Request $request)
    {
        $users = $this->UserRepository->search($request);
        return view('users.index', compact('users'));
    }
}
