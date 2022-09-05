<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TestFormRequest;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class TestController extends Controller
{
    //
    public function index(){

        $tests = Test::all();
        
        $tests = Test::paginate(7);


        return view('admin.test.index', compact('tests'));
    }

    public function create(){

        // Get all courses if status is zero
        $courses = Courses::where('status', 0)->get()->toArray();

        return view('admin.test.create', compact('courses'));

    }

    public function store(TestFormRequest $request){

        $data = $request->validated();

        $test = new Test;

        $test->courses_id = $data['courses_id'];
        $test->title = $data['title'];
        $test->description = $data['description'];

        if($request->hasfile('image')){

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/tests/', $filename);
            $test->image = $filename;

        }

        $test->status = $request->status == true ? '1':'0';
        $test->created_by = Auth::user()->id;
        $test->save();

        return redirect('admin/tests')->with('message', 'Test Added Successfully');

        

    }

    public function edit($test_id){

        $courses = Courses::where('status', '0')->get()->toArray();

        $test = Test::find($test_id)->toArray();

        return view('admin.test.edit', compact('test','courses'));
    }

    public function update(TestFormRequest $request, $test_id){


        $data = $request->validated();

        $test = Test::find($test_id);

        $test->courses_id = $data['courses_id'];
        $test->title = $data['title'];
        $test->description = $data['description'];

        if($request->hasfile('image')){

              // if image exists, image delete
              $destination = 'uploads/tests/'.$test->image;
              if(File::exists($destination)){
  
                  File::delete($destination);
  
              }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/tests/', $filename);
            $test->image = $filename;

        }

        $test->status = $request->status == true ? '1':'0';
        $test->created_by = Auth::user()->id;
        $test->update();

        return redirect('admin/tests')->with('message', 'Test Edited Successfully');


    }


    public function delete($test_id){


        $test = Test::find($test_id);

        if($test){

            // Delete photo from folder
            $destination = "uploads/courses/".$test->image;
            if(File::exists($destination)){

                File::delete($destination);
            }

            $test->delete();
            return redirect('admin/tests')->with('message', 'Test Deleted Successfully');

        }else{


            return redirect('admin/tests')->with('message', 'No Test Id Found');

        }

    }
}
