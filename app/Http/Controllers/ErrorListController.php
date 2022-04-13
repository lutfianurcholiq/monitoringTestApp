<?php

namespace App\Http\Controllers;

use App\Models\errorList;
use App\Models\TestScenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreerrorListRequest;
use App\Http\Requests\UpdateerrorListRequest;


class ErrorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.errorList.index', [
            'title' => "View Error List",
            'errorList' => ErrorList::all(),
            'testScenario' => TestScenario::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.errorList.create', [
            'title' => "Create Error",
            'testScenarios' => TestScenario::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
    
        $validatedData = $request->validate([
            'test_scenario_id' => 'required',
            'note' => 'required|max:255',
            'image' => 'image|file|max:10000|mimes:jpg,png,jpeg',
            'status' => 'max:255'
        ]);


        $validatedData = ErrorList::create([
            'user_id' => Auth()->user()->id,
            'note' => $request->note,
            'image' => $request->file('image')->store('image-bug'),
            'status' => $request->status
        ]);

        $validatedData->testScenarios()->sync($request->test_scenario_id);

        return redirect('/errorList')->with('success', 'Error Success Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\errorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function show(errorList $errorList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\errorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function edit(errorList $errorList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateerrorListRequest  $request
     * @param  \App\Models\errorList  $errorList
     * @param  \App\Models\TestScenario $testScenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, errorList $errorList)
    {

        // return $request;

        $request->validate([
            'status' => 'max:255'
        ]);

        $errorList->testScenarios()->update([
            'result' => $request->status,
            'status' => "done" 
        ]);

        
        $errorList->update([
            'status' => $request->status
        ]);
        
        // return $errorList;
        // return $errorList;
        
        // $errorList = TestScenario::all('result','id');

        // // dd($errorList);

        // foreach($errorList as $test)
        // {   
        //     $test->result = "success";
        //     if($test->result == "success")
        //     {
        //         $test->status = "done";
        //     }
        //     $test->where('id');
        //     $test->save();
        // }

        // return $errorList;

        return redirect('/errorList')->with('success', 'Bug is success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\errorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function destroy(errorList $errorList)
    {
        //
    }
}
