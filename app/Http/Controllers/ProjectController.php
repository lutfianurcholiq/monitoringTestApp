<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.project.index', [
            'title' => "View Project",
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->level != "System Analyst")
        {
            return redirect('/project')->with('failed', 'Isnt Your Access');
        }
        return view('dashboard.project.create', [
            'title' => "Create Project",
            'groups' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'group_id' => 'required'
        ]);

        Project::create($validatedData);

        return redirect('/project')->with('success', 'Create Project is Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.project.edit', [
            'project' => $project,
            'title' => "Edit Project",
            'groups' => Group::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'group_id' => 'required'
        ]);

        Project::where('id', $project->id)->update($validatedData);

        return redirect('/project')->with('success', 'Update has been success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);

        return redirect('/project')->with('success', 'Delete has been success');
    }
}
