<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Todo;
use App\Step;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Get Todos For The Current User
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        $todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect()->route('todo.index')->with('message', 'Todo Created Successfully!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|min:3|max:255|unique:todos,title,' . $todo->id,
            'description' => 'required|min:3|max:255'
        ]);
        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                // If the id is not find create a ID
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect()->route('todo.index')->with('message', 'Todo Updated!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Mark as completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Mark as incomplete');
    }

    public function destroy(Todo $todo)
    {
        // $todo->steps->each->delete() -- delete relationship
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted successfully!');
    }
}
