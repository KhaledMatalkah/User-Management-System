<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $DashboardRepository;

    public function __construct(DashboardRepositoryInterface $DashboardRepository)
    {
        $this->DashboardRepository = $DashboardRepository;
    }


    public function index()
    {
        return view('dashboard.index');
    }


    public function usertable(){
        $users = $this->DashboardRepository->usertable();
        return $users;
    }

    public function createUser()
    {
        $departments = $this->DashboardRepository->createUser();
        return view('dashboard.createUser', compact('departments'));
    }

    public function store(Request $request)
    {
        $result = $this->DashboardRepository->store($request);
        if ($result == true) {
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('message', 'This Email Is Already Exist!');
        }
    }


    public function edit($id){
        [$user, $departments] = $this->DashboardRepository->edit($id);
        if($user == null || $departments == null){
            return abort(404);
        }else{
            return view('dashboard.editUser',compact('user', 'departments'));
        }
    }


    public function updateUser(Request $request, $id)
    {
        $result = $this->DashboardRepository->store($request, $id);
        if ($result == true) {
            return redirect()->route('index');
        }else{
            return back()->with('message', 'This Email Is Already Exist!');
        }
    }

    public function delete($id){
        $this->DashboardRepository->delete($id);
        return back();
    }
}
