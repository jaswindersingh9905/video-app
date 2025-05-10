<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\DataTables\TasksDataTable;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TasksDataTable $dataTable)
    {
        return $dataTable->render('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = Task::create(
            [
                ...$request->validate([
                    'title' => 'required | max:255 |string',
                    'status_id' => 'required | int',
                    'start_date' => 'required | date',
                    'due_date' => 'required | date | after:start_date',
                    'priority' => 'required | int',
                    'description' => 'required | string | max:1000'

                ]),
                'user_id' => 1
            ]
        );
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update(
            $request->validate([
                'title' => 'sometimes | max:255 |string',
                'status_id' => 'sometimes | int',
                'start_date' => 'sometimes | date',
                'due_date' => 'sometimes | date | after:start_date',
                'priority' => 'sometimes | int',
                'description' => 'sometimes | string | max:1000'

            ])
        );
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}