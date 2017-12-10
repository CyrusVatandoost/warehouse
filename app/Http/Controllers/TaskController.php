<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task; 
use App\Log;
use App\Project;

class TaskController extends Controller
{
    //returns all tasks sorted by date
    public function index() {
        $tasks = Task::orderBy('created_at', 'DESC')->get();
        return view('project.progress', compact('tasks'));
    }

    //stores a new task in warehousedb.tasks
    public function store($project_id) {
    	$task = new Task;

    	$task->project_id = $project_id;
    	$task->created_by = auth()->id();
    	$task->assigned_to = request('task_assigned_to');
    	$task->name = request('task_name');
    	$task->completed = 0;

    	$task->save();

        //add store action to logs table
        $log = new Log;
        $project = Project::find($project_id);

        $log->user_id = auth()->id();
        $log->user_action = "created a task in " . $project->name;
        $log->action_details = request('task_name');
        $log->save();
        //end log

    	return back();
    }

    //deletes a single task using an ID
    public function delete($id) {
     	$task = Task::find($id);
     	$project = Project::find($task->project_id);

        //add delete action to logs table
        $log = new Log;

        $log->user_id = auth()->id();
        $log->user_action = "deleted a task from" . $project->name;
        $log->action_details = $task->name;
        $log->save();
        //end log

		DB::table('tasks')->where('task_id', $id)->delete();

        return redirect('/project/progress');
    }

    //change completed status of a task
    public function setCompleteness($id) {
    	$task = Task::find($id);
    	$project = Project::find($task->project_id);
    	$log = new Log;

		if($task->complete == 1) {
			$task->complete = 0;

			//logs
			$log->user_id = auth()->id();
	        $log->user_action = "marked a task in " . $project->name . " as";
	        $log->action_details = "not done";
		}
		else {
			$task->complete = 1; 

			$log->user_id = auth()->id();
	        $log->user_action = "marked a task in " . $project->name . " as";
	        $log->action_details = "completed";
		}

		$task->save();
		$log->save();

		return redirect('/project/progress');
    }
}
