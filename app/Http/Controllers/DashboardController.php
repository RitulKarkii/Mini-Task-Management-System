<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Task; 
use App\Models\Category; 

class DashboardController extends Controller
{
    public function create()
    {
        if(auth()->user()->role === 'admin'){
            $tasks = Task::with('category')->get();
        } else {
            $tasks = Task::with('category')->where('user_id', auth()->id())->get();
        }
        $categories = Category::all();

        return view('dashboard', compact('tasks', 'categories'));
    }

    public function task(Request $request){
        $request->validate([
            'title'=> 'required',
            'discription'=>'nullable',
            'status'=>'required',
            'priority' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $task = Task::create([
            'user_id'=>Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'discription' => $request->discription,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

           return redirect()->back()->with('success', 'Task created successfully!');
    }

    public function edit($id){
        $task = Task::find ($id);
        $categories = Category::all(); 
        return view('edit', ['data'=>$task, 'categories' => $categories]);
    }

    public function editTask(Request $request,$id){
        $task = Task::find ($id);
        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->discription = $request->discription;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->save();
        if($task->save()){
             return redirect('/dashboard')->with('success', 'Task updated successfully!');
        }else{
            return "Update opration failed.";
        }
    }

    public function delete($id)
    {
        $isDeleted = Task::destroy($id);

        if($isDeleted){
            return redirect('/dashboard')->with('success', 'Task deleted successfully!');
        }
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/');
    }


}
