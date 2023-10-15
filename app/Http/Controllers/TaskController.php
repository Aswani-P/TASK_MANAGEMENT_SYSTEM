<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function dash()
    {
        $user_id = Auth::id();//id from user table 
        $tasks = Task::where('user_id',$user_id)->get();
                                                   
        return view('task.task',compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request){
       
        $task =request('task');
        $description=request('des');
        $status = request('status');

        Task::create([
            'user_id'=>Auth::id(),
            'task'=>$task,
            'description'=>$description,
            'status'=>$status
        ]);

        return redirect()->route('task')->with('message','Task added successfully');

    }
    // public function edit($id){
    //     $tasks = Task::find($id);
    //     return view('task.edit',compact('tasks','id'));

    // }
    public function edit($id){
        $tasks = Task::find($id);
        return view('task.edit',compact('tasks','id'));

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

        return redirect()->route('task')->with('message','successfully updated');
    }
    public function delete(){
        $id=request('id');
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect()->route('task')->with('message','successfully deleted');
    }
}
