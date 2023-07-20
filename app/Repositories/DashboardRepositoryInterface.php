<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface DashboardRepositoryInterface
{
    public function index();
    public function usertable();
    public function createUser();
    public function store(Request $request);
    public function edit($id);
    public function delete($id);
}
