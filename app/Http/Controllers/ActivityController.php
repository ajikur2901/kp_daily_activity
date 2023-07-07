<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('activity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('activity.create', [
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required|exists:project,id',
        ]);

        Activity::create($request->post());

        return redirect()
            ->route('activity.index')
            ->with('success', 'Activity has been created successfully.');
    }

    /**
     * change status to wip
     */
    public function start(Activity $activity)
    {
        $activity->status_id = Status::ACTIVITY_WIP;
        $activity->start = date('Y-m-d H:i:s');
        if ($activity->save()) {
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity Status has been updated successfully.');
        } else {
            return redirect()
                ->route('activity.index')
                ->with('failed', 'Activity Status update failed.');
        }
    }

    /**
     * change status to done
     */
    public function finish(Activity $activity)
    {
        $activity->status_id = Status::ACTIVITY_DONE;
        $activity->finish = date('Y-m-d H:i:s');
        if ($activity->save()) {
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity Status has been updated successfully.');
        } else {
            return redirect()
                ->route('activity.index')
                ->with('failed', 'Activity Status update failed.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $projects = Project::all();
        return view('activity.edit', [
            'activity' => $activity,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required|exists:project,id',
        ]);

        try {
            $activity->update($request->all());
            return redirect()
                ->route('activity.index')
                ->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            print_r($e->getMessage());
            exit();
            return back()->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        if ($activity->delete()) {
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity has been deleted successfully.');
        } else {
            return redirect()
                ->route('activity.index')
                ->with('failed', 'Activity delete failed.');
        }
    }
}
