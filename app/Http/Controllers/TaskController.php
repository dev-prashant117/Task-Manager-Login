<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskController extends Controller
{
    use AuthorizesRequests;

    public function test()
    {
        return response()->json(['message' => 'Test route working']);
    }
    
    
    public function index()
    {
        // echo "dfdfd";die;
        return auth()->user()->tasks;
    }
    
    public function store(Request $request)
    {

        // echo "fdf";die;
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);
    
        return auth()->user()->tasks()->create($data);
    }
    

    public function show($id)
    {
        $task = Task::where('id', $id)
                    ->where('user_id', auth()->id()) // Only fetch if it belongs to logged-in user
                    ->first();
    
        if (!$task) {
            return response()->json(['message' => 'Task not found or unauthorized'], 404);
        }
    
        return response()->json($task);
    }
    



public function update(Request $request, $id)
{

    // print_r($request->all());die;

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'required|date',
        'status' => 'required|in:pending,completed',
    ]);

    $task = Task::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

    $task->update($request->only(['title', 'description', 'due_date', 'status']));

    return response()->json([
        'message' => 'Task updated successfully.',
        'task' => $task,
    ]);
}
    
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', auth()->id())->first();

        if (! $task) {
            return response()->json(['message' => 'Task not found or not authorized'], 403);
        }
    
        $task->delete();
        return response()->json([
            'message' => 'Task Deleted successfully.',
        ]);
        // return response()->noContent();
    
    }
    
}
