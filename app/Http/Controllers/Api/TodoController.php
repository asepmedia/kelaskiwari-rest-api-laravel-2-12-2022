<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todoList = Todo::all();

        return new ResponseResource($todoList);
    }

    public function show($id)
    {
        $todo = Todo::find($id);

        return new ResponseResource($todo);
    }

    public function store(TodoRequest $request)
    {
        $data = $request->data();

        $create = Todo::create($data);

        return new ResponseResource($create);
    }

    public function update(TodoRequest $request, Todo $todo)
    {
        $data = $request->data();

        $todo->update($data);

        return new ResponseResource($todo);
    }

    public function status(Todo $todo)
    {
        $todo->update([
            'is_done' => !$todo->is_done
        ]);

        return new ResponseResource($todo);
    }
}
