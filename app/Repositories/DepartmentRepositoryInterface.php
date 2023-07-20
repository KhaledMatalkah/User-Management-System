<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface DepartmentRepositoryInterface
{
    public function index();
    public function store(Request $request);
    public function delete($id);
}
