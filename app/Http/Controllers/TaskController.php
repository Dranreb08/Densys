<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use DB;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
	
    public function index(Request $request)
    {
		Log::useDailyFiles(storage_path().'/logs/nolie.log');
		Log::info("info to log");
		//$tasks = DB::select("select * from users");
		
		//Log::info($tasks);
		/* foreach($tasks as $task_key => $task_val){
			Log::info($task_val->name);
		} */
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		Log::info('Showing user profile for user: '.$request->name);
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
	 public function update(Request $request, Task $task)
    {
        //$this->authorize('destroy', $task);
		//$tobeupdated = $this->task($task);
		Log::info($request);
		if(Task::where('id', $task->id)->update(['name' => $request->name]))
			return redirect('/tasks')->with('message', 'Saved!');;
		
			
        //$task->delete();

        //
    }
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
		
        $task->delete();

        return redirect('/tasks');
    }
}
