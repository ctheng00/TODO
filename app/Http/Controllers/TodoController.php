<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //2=COMPLETED, 0=KIV, 3=ABANDONED, 1=IN-PROGRESS
        //0=PUBLIC, 1=USERS, 2=SELF
        $todo;
        if(Auth::check()){
            $todo = Todo::select('todos.id','todos.title','todos.description','todos.created_at','todos.status','users.name')->where('privacy', '<', 2)->orWhere('created_by', Auth::id())->leftJoin('users', 'users.id', '=', 'todos.created_by')->orderBy('todos.created_at', 'desc')->get();
        }else{
            $todo = Todo::select('todos.id','todos.title','todos.description','todos.created_at','todos.status','users.name')->where('privacy', '<', 1)->leftJoin('users', 'users.id', '=', 'todos.created_by')->orderBy('todos.created_at', 'desc')->get();
        }
        return view('welcome',compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
           
        $input = $request->all();
        $todo = new Todo;

        $todo->title = $input['title'];
        $todo->description = $input['description'];
        $todo->privacy = $input['privacy'];
        $todo->created_by = Auth::id();


        $todo->save();

        return redirect("/")->withSuccess('New Task Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $input = $request->all();
        $todo = Todo::find($input['id']);

        $todo->status = $input['status'];

        $todo->save();
        return redirect("")->withSuccess('Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
