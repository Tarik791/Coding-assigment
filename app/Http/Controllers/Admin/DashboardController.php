<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index(){

        $courses = Courses::count();
        $tests = Test::count();
        $users = User::where('role_as','0')->count();
        $admins = User::where('role_as', '1')->count();

        //return 'I am dashboard';
        return view('admin.dashboard', compact('courses', 'tests','users', 'admins'));
    }
}
