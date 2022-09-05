<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UsersController extends Controller
{
    //
    public function index(){

        $users = User::all()->toArray();

        return view('admin.users.index', compact('users'));
    }

    public function create(){



        return view('admin.users.create');


    }

    public function store(UserFormRequest $request){

        $data = $request->validated();

        $users = new User;
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);

        if($request->hasfile('image')){
    
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/users/', $filename);
            $users->image = $filename;

        }

        $users->created_by = Auth::user()->id;
        $users->save();

        return redirect('admin/users')->with('message', 'User Added Successfully');




    }



    public function edit($user_id){


        $users = User::find($user_id)->toArray();

        return view('admin.users.edit', compact('users'));


    }

    public function update(UserFormRequest $request, $user_id){

        $data = $request->validated();

        $users = User::find($user_id);
        $users->name = $data['name'];
        $users->email = $data['email'];
        

        if($request->hasfile('image')){

            $destination = 'uploads/users/'.$users->image;
            if(File::exists($destination)){

                File::delete($destination);
            }
    
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/users/', $filename);
            $users->image = $filename;

        }

        $users->created_by = Auth::user()->id;
        $users->role_as = $request->role_as;
        $users->update();

        return redirect('admin/users')->with('message', 'User Edited Successfully');

    }


    public function delete($user_id){

        $users = User::find($user_id);

        if($users){

            // Delete photo from folder
            $destination = "uploads/users/".$users->image;
            if(File::exists($destination)){

                File::delete($destination);
            }

            $users->delete();
            return redirect('admin/users')->with('message', 'User Deleted Successfully');

        }else{


            return redirect('admin/users')->with('message', 'No User Id Found');

        }


    }



}
