<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('timeline.index', compact('projects'));
    }

    public function project(Request $request)
    {
        $request->validate([
            'project' => 'required',
        ]);

        $users = User::all();
        $resources = [];
        foreach ($users as $user) {
            $resources[] = [
                'id' => $user->id,
                'text' => $user->name
            ];
        }

        $idProject = $request->input('project');
        $activities = Activity::where('project_id', $idProject)->get();
        $tasks = [];
        $resourceAssignments = [];
        foreach ($activities as $activity) {
            $task = new stdClass();
            $task->id = $activity->id;
            $task->parentId = 0;
            $task->title = $activity->title;
            $task->start = $activity->start;
            $task->end = $activity->finish;
            $task->progress = 100;
            $tasks[] = $task;

            $resourceAssignments[] = [
                'id' => $activity->id,
                'taskId' => $activity->id,
                'resourceId' =>  $activity->user_id,
            ];
        }


        return view('timeline.detail', compact('resources', 'tasks', 'resourceAssignments'));
    }
}
