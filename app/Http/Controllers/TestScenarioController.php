<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Project;
use App\Models\TestScenario;
use App\Models\errorList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->level != "Quality Assurance")
        {
            return redirect('/testscenario')->with('failed', 'Isnt your access');
        }
        
        return view('dashboard.testscenario.create', [
            'users' => User::all(),
            'projects' => Project::all(),
            'modules' => Module::with('project')->get(),
            'title' => "Create Test Scenario"

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TestScenario $testScenario)
    { 
        // return $request;  
        $validated = $request->validate([
            'scenario' => 'required|max:255',
            'project_id' => 'required',
            'module_id' => 'required',
            'type' => 'required',
            'step' => 'required',
            'result' => 'required',
        ]);

        if($validated['result'] == "success"){

            $validated['status'] = "done";

        }else{
            
            $validated['status'] = "failed";

            $bank = TestScenario::all('id')->count();

            ErrorList::create([
                'user_id' => Auth()->user()->id,
                'project_id' => $request->project_id,
                'test_id' => $bank + 1,
                'module_id' => $request->module_id,
                'cased' => $request->scenario,
                'note' => $request->note,
                'image' => $request->file('image')->store('image-bug'),
                'status' => $request->status
            ]);
            
            // $validated->testScenarios()->sync($request->error_list_id);
        }

        $validated['user_id'] = auth()->user()->id;
        
        TestScenario::create($validated);


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
