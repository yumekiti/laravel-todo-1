<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoStateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo $request;
        echo $id;
        // $todo = new Todo;
        // $tasks = $todo::find($id);
        // $tasks->completed = $tasks->completed === 0 ? 1 : 0;
        // $tasks->save();
    }
}
