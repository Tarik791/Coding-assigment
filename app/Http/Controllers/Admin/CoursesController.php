<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CourseFormRequest;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CoursesController extends Controller
{
    //
    public function index(){

        $courses = Courses::all()->toArray();

        return view('admin.courses.index', compact('courses'));
    }

    public function create(){


        return view('admin.courses.create');
    }


    public function store(CourseFormRequest $request){

        $data = $request->validated();



            $courses = new Courses;
            $courses->title = $data['title'];
            $courses->description = $data['description'];
    
            if($request->hasfile('image')){
    
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/courses/', $filename);
                $courses->image = $filename;
    
            }
    
            $courses->status = $request->status == true ? '1':'0';
            $courses->created_by = Auth::user()->id;
            $courses->save();
    
            return redirect('admin/courses')->with('message', 'Course Added Successfully');
        
       
    }

    public function edit($courses_id){

        $courses = Courses::find($courses_id)->toArray();
        return view('admin.courses.edit', compact('courses'));


    }

    public function update(CourseFormRequest $request, $courses_id){


        $data = $request->validated();



        $courses = Courses::find($courses_id);
        $courses->title = $data['title'];
        $courses->description = $data['description'];

        if($request->hasfile('image')){

            // if image exists, image delete
            $destination = 'uploads/courses/'.$courses->image;
            if(File::exists($destination)){

                File::delete($destination);

            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/courses/', $filename);
            $courses->image = $filename;

        }

        $courses->status = $request->status == true ? '1':'0';
        $courses->created_by = Auth::user()->id;
        $courses->update();

        return redirect('admin/courses')->with('message', 'Course Edited Successfully');


    }


    public function delete($courses_id){


        $courses = Courses::find($courses_id);

        if($courses){

            // Delete photo from folder
            $destination = "uploads/courses/".$courses->image;
            if(File::exists($destination)){

                File::delete($destination);
            }
            $courses->tests()->delete();
            $courses->delete();
            return redirect('admin/courses')->with('message', 'Course and Test For this course Deleted Successfully');

        }else{


            return redirect('admin/courses')->with('message', 'No Courses Id Found');

        }

    }
}
