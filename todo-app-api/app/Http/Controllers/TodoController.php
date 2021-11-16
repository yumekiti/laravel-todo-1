<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Todo
        // どうやってAuth認証の情報をとってきたらいいの、、、
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check($id)
    {
        $tasks = Todo::find($id);
        $tasks->completed = $tasks->completed === 0 ? 1 : 0;
        $tasks->save();
        return $tasks;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Todo::find($id)->delete();
    }
}
