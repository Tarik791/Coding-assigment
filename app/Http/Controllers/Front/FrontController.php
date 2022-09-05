<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Test;
use App\Models\User;

class FrontController extends Controller
{
    //
    public function index(){

        // Get All courses in index page
        $all_courses = Courses::where('status', '0')->paginate(2);

        // Get All corses list
        $all_courses_list = Courses::where('status', '0')->get();

        //get latest tests
        $latest_tests = Test::where('status', '0')->orderBy('created_at', 'DESC')->get()->take(15);


        return view('frontend.index', compact('all_courses', 'all_courses_list', 'latest_tests'));
    }

    public function profile($user_id){

        $users = User::all();

        return view('frontend.profile', compact('users'));
    }



    public function viewCourses(string $courses_title){

        $courses = Courses::where('title', $courses_title)->where('status','0')->first();

        if($courses){

            $test = Test::where('courses_id', $courses->id)->where('status', '0')->paginate(5);

            return view('frontend.test.index', compact('test', 'courses'));

        }else{

            return redirect('/');

        }
        

    }

    public function viewTest(string $courses_title, string $test_title){


    $courses = Courses::where('title', $courses_title)->where('status','0')->first();

        if($courses){


            $test = Test::where('courses_id', $courses->id)->where('title', $test_title)->where('status', '0')->first();

            // Get Latest test
            $latest_test = Test::where('courses_id', $courses->id)->where('status', '0')->orderBy('created_at','DESC')->get()->take(15);


            return view('frontend.test.view', compact('test', 'latest_test'));

        }else{

            return redirect('/');

        }

    }
}
