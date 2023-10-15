<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
// use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function read(){
        $tasks = Task::all();
        return view('admin.admin_index',compact('tasks'));

    }
    public function update()
    {
        $id = request('id');
        $tasks = Task::find($id);
        $tasks->update([
            'task'=>request('task'),
            'description'=>request('des'),
            'status'=>request('status'),
        ]);
        // return $tasks;

        return redirect()->route('admin_home')->with('message','successfully updated');
    }
    public function  admin_add()
    {
        return view('admin.admin_add');
    }
    public function store(Request $request){
       
        $task =request('task');
        $description=request('des');
        $status = request('status');

        Task::create([
            // 'user_id'=>Auth::id(),
            'task'=>$task,
            'description'=>$description,
            'status'=>$status
        ]);
        return redirect()->route('admin_home')->with('message','Task added successfully');
    }
    
}