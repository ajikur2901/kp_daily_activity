<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:project|max:255',
            'nama' => 'required',
            'client' => 'required',
        ]);

        Project::create($request->post());

        return redirect()
            ->route('project.index')
            ->with('success', 'Project has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'kode' => 'required|max:255|unique:project,kode,' . $project->id,
            'nama' => 'required',
            'client' => 'required',
        ]);

        try {
            $project->update($request->all());
            return redirect()
                ->route('project.index')
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
    public function destroy(Project $project)
    {
        if ($project->delete()) {
            return redirect()
                ->route('project.index')
                ->with('success', 'Project has been deleted successfully.');
        } else {
            return redirect()
                ->route('project.index')
                ->with('failed', 'Project delete failed.');
        }
    }
}
