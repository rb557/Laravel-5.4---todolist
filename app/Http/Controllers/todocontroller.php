<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;

class todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $todos=todo::all()->where('owner_id',$id);
       return view('todo.home',compact('todos'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->user()) {

            $id = $request->user()->id;
            $todo = new todo;
            $this->validate($request, [
                'body' => 'required',
                'title' => 'required|unique:todos',
            ]);
            $todo->title = $request->title;
            $todo->body = $request->body;
            $todo->owner_id = $id;
            $todo->save();
            return redirect('/todo');
            //  return $request->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

       // $request->user()->id;
        $item=todo::find($request->user()->id);
        return view('todo.show',compact('item'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=todo::find($id);
        return view('todo.edit',compact('item'));
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
        $todo=todo::find($id);
        $this->validate($request,[
            'body'=>'required',
            'title'=>'required',
        ]);
        $todo->body=$request->body;
        $todo->title=$request->title;
        $todo->save();
        session()->flash('message','Updated Successfully');
        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=todo::find($id);
        $item->delete();
        session()->flash('message','Deleted Successfully');
        return redirect('/todo');
       // to check if the delete button is working return $id;
        //
    }
}
