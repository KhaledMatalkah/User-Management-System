<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function index($id);
    public function search(Request $request);
}
