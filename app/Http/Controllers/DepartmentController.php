<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Repositories\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $DepartmentRepository;

    public function __construct(DepartmentRepositoryInterface $DepartmentRepository)
    {
        $this->DepartmentRepository = $DepartmentRepository;
    }
    
    public function index()
    {
        $departments = $this->DepartmentRepository->index();
        return view('departments.index', compact('departments'));
    }



    public function store(Request $request)
    {
        $department = $this->DepartmentRepository->store($request);
        return response()->json(['department' => $department]);
    }

    public function delete($id)
    {
        $result = $this->DepartmentRepository->delete($id);
        if ($result == true) {
            return response()->json(['message' => 'Department deleted successfully.']);
        }else{
            return response()->json(['message' => 'Cannot delete the department. There are users associated with it.'], 422);
        }
    }
}
