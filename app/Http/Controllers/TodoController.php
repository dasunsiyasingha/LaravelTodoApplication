<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct(){
        $this->task = new Todo();
    }

    public function GotoTodo(){

        $response['tasks'] = $this->task->all();

        return view('pages.todo.index')->with($response);
    }

    public function addTask(Request $request){
        $this->task->create($request->all());
        //without all() function we can do this
        // $this->task->title = $request->title;
        // $this->task->save();

        return redirect() ->back();
        // return redirect() -> route('todo');
    }

    public function delete($task_id) {
        $task = $this->task->find($task_id);
        $task->delete();

        return redirect() ->back();
    }

    public function statusChange($task_id) {
        $task = $this->task->find($task_id);

        if ($task->done) {
            $task->done = 0;
        } else {
            $task->done = 1;
        }
        $task->update();

        return redirect() ->back();
    }


}
