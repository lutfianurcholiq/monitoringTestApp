<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Module;
use App\Models\TestScenario;
use Illuminate\Http\Request;

class TestScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.testscenario.index', [
            'title' => "View Test Scenario",
            'testSce' => TestScenario::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.testscenario.create', [
            'users' => User::all(),
            'projects' => Project::all(),
            'modules' => Module::all(),
            'title' => "Create Test Scenario"

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
            'scenario' => 'required|max:255',
            'project_id' => 'required',
            'module_id' => 'required',
            'type' => 'required',
            'step' => 'required',
            'result' => 'required',
        ]);

        if($validatedData['result'] == "Success"){
                $validatedData['status'] = "Done";
        }else{
                $validatedData['status'] = "Failed";
        }

        $validatedData['user_id'] = Auth()->user()->id;

        TestScenario::create($validatedData);

        return redirect('/testscenario')->with('success', 'Test Scenario Created Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestScenario  $testScenario
     * @return \Illuminate\Http\Response
     */
    public function show(TestScenario $testScenario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestScenario  $testScenario
     * @return \Illuminate\Http\Response
     */
    public function edit(TestScenario $testScenario)
    {
        // return view('dashboard.testscenario.edit', [
        //     'title' => "Edit Test Scenario",
        //     'test' => $testScenario,
        //     'projects' => Project::all(),
        //     'modules' => Module::all(),
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestScenario  $testScenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestScenario $testScenario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestScenario  $testScenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestScenario $testScenario)
    {
        //
    }
}
