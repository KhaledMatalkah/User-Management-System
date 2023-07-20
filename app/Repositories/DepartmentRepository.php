<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function index()
    {
        $departments = Department::all();

        return $departments;
    }



    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|unique:departments|max:255',
        ]);

        // Create the new department
        $department = new Department();
        $department->name = $validatedData['name'];
        $department->save();

        // Return the department row HTML as a JSON response
        return $department->name;
    }

    public function delete($id)
    {
        $department = Department::findOrFail($id);

        // Check if there are users associated with the department
        $usersCount = User::where('department_id', $department->id)->count();
        if ($usersCount > 0) {
            return false;
        }

        $department->delete();

        return true;
    }
}
