<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index()
   {
       $tasks = Task::all();
        return view('tasks',compact('tasks')); 
   }

    public function store(Request $request)
   {
      $task = new Task();
      $task->name = $request->name;
      $task->save();
      return redirect('/');     
   }

   public function delete($id)
   {
       Task::findOrFail($id)->delete();
       return redirect('/');
   }
}
