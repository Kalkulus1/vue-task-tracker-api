<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TasksResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data =  $request->validate([
            'text' => 'required|string',
            'day' => 'required|string',
            'reminder' => 'nullable',
        ]);

        // $task = Task::create([
        //     'text' => $data['text'],
        //     'day' => $data['day'],
        //     'reminder' => $data['reminder'],
        // ]);

        $task = new Task;
        $task->text = $request->text;
        $task->day = $request->day;
        if ($request->reminder) {
            $task->reminder = $request->reminder;
        }else{
            $task->reminder = 0;
        }

        $task->save();

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        $data =  $request->validate([
            'reminder' => 'nullable',
        ]);

        $task = Task::find($id);

        $task->reminder = $request->reminder;

        $task->save();

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json('Not Found!', 200);
        }

        $task->delete();

        return "Deleted!";
    }
}
