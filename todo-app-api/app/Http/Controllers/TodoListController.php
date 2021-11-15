<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoListController extends Controller
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
        $todo = new Todo;
        $tasks = $todo->get();
        return $tasks;
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

        $todo = new Todo;
        $todo->id_users = $request->id_users;
        $todo->title = $request->title;
        $todo->text = $request->text;
        $todo->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = new Todo;
        $tasks = $todo::find($id);
        return $tasks;
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
        $result = $request->validate([
            "title" => "required",
        ]);
        
        $todo = new Todo;
        $tasks = $todo::find($id);
        $tasks->title = $request->title;
        $tasks->text = $request->text;
        $tasks->save();
    }
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         "id" => "required",
    //         "title" => "required",
    //     ]);
        
    //     $todo = new Todo;
    //     $tasks = $todo::find($request->id);
    //     $tasks->title = $request->title;
    //     $tasks->text = $request->text;
    //     $tasks->save();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
