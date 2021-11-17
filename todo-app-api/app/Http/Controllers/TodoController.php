<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // Todo
        // どうやってAuth認証の情報をとってきたらいいの、、、
        return Todo::all();
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            "id_users" => "integer|required",
            "title" => "required",
        ]);

        $tasks = new Todo;
        $tasks->id_users = $request->id_users;
        $tasks->title = $request->title;
        $tasks->text = $request->text;
        $tasks->save();
        return $tasks;

    }

    public function show($id)
    {
        return Todo::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
        ]);
        
        $tasks = Todo::find($id);
        $tasks->title = $request->title;
        $tasks->text = $request->text;
        $tasks->save();
        return $tasks;
    }
    
    public function check($id)
    {
        $tasks = Todo::find($id);
        $tasks->completed = $tasks->completed === 0 ? 1 : 0;
        $tasks->save();
        return $tasks;
    }

    public function destroy($id)
    {
        Todo::find($id)->delete();
        return Todo::withTrashed()->find($id);
    }
}
