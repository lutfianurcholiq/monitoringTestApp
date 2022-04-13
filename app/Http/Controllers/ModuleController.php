<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use Illuminate\Http\Request;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.module.index', [
            'title' => 'View Module',
            'modules' => Module::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.module.create', [
            'title' => "Create Module",
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_modul' => 'required|max:255',
            'project_id' => 'required'
        ]);

        Module::create($validatedData);

        $request->session()->flash('success', 'Create Modul is Success');

        return redirect('/module');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('dashboard.module.edit', [
            'title' => "Edit Module",
            'module' => $module,
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModuleRequest  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $validatedData = $request->validate([
            'name_modul' => 'required|max:255',
            'project_id' => 'required' 
        ]);

        Module::where('id', $module->id)->update($validatedData);

        return redirect('/module')->with('success', 'Update has been success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        // return $module;
        Module::destroy($module->id);

        return redirect('/module')->with('success', 'Delete has been success');
    }
}
