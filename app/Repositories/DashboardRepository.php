<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DashboardRepository implements DashboardRepositoryInterface
{
    public function index()
    {
        return view('dashboard.index');
    }


    public function usertable(){
        $data = User::Role('user')->get();
        return DataTables::of($data)
        ->editColumn('id', function($data){
            return $data->id;
        })
        ->editColumn('f_name', function($data){
            return $data->f_name;
        })
        ->editColumn('l_name', function($data){
            return $data->l_name;
        })
        ->editColumn('email', function($data){
            return $data->email;
        })
        ->editColumn('gender', function($data){
            return $data->gender;
        })
        ->editColumn('created_at', function($data){
            return $data->created_at;
        })
        ->editColumn('actions', function($data){
            $actions[]=[
                'name'=>'edit',
                'class'=>'btn btn-primary btn-action',
                'route'=>route('edit',$data->id),
                'icon'=>'fas fa-pencil-alt'
            ];
            $actions[]=[
                'name'=>'delete',
                'class'=>'btn btn-danger btn-action',
                'route'=>route('delete',$data->id),
                'icon'=>'fas fa-trash',
                'flag'=>'delete'
            ];
            $actions[]=[
                'name'=>'add',
                'class'=>'btn btn-success btn-action',
                'route'=>route('userProfile',$data->id),
                'icon'=>'fas fa-eye'
            ];
            return view('datatable.actions',compact('actions'));
        })
        ->make(true);
    }

    public function createUser()
    {
        $departments = Department::all();
        return $departments;
    }

    public function store(Request $request, $id = null)
    {
        if ($id) {
            $user = User::find($id);
            if (!$user) {
                return false;
            }
            if ($request->email !== $user->email && User::where('email', $request->email)->exists()) {
                return false;
            }
        } else {
            if (User::where('email', $request->email)->exists()) {
                return false;
            }
            $user = new User();
            $user->assignRole('user');
        }

            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->department_id = $request->department;
            $user->save();
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move('public/images', $filename);

                $imageModel = new Image();
                $imageModel->name = $filename;
                $imageModel->user_id = $user->id;
                $imageModel->save();
            }
            return true;
    }


    public function edit($id){
        $user = User::find($id);
        if(!$user){
            return 404;
        }else{
            $departments = Department::all();
            return [$user, $departments];
        }
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
    }
}
