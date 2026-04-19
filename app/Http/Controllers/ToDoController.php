<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use PDO;

class ToDoController extends Controller
{
    //
    public function showToDo(){

        $todos = ToDo::where('user_id', session('user')->id)->get();

        return view('todo', compact('todos'));
    }

    public function todo(Request $request){
        ToDo::create([
            'user_id' => session('user')->id,
            'task' => $request->todo
        ]);

        return back()->with('success', 'Task added successfully');
    }

    public function deleteToDo($id){

        $todo = ToDo::where('id', $id)
        ->where('user_id', session('user')->id)
        ->first();

        if(!$todo){
            return back()->with('error', 'Unable to delete task');
        }

        $todo->delete();

        return back()->with('success', 'Task deleted successfully');

    }

    public function updateTask(Request $request, $id){

        $todos = ToDo::where('id', $id)
        ->where('user_id', session('user')->id)
        ->first();

        if(!$todos){
            return back()->with('error', 'Unable to edit task');
        }

        $todos->update([
            'task' => $request->task
        ]);

        return back()->with('success', 'Task updated successfully');

    }

}
