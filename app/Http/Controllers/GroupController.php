<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.group.index', [
            'title' => "View Group",
            'groups' => Group::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.group.create', [
            'title' => "Create Group",
            'users' => User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {

        $validated = $request->validate([
            'name_group' => 'required|max:255',
            // 'user_id' => 'required|array'
        ]);
      

        // $validated = Group::create([
        //     'name_group' => $request->name_group,
        // ]);

        Group::create($validated);

        // $validated->users()->sync($request->user_id);

        // return $validated;

        return redirect('/group')->with('success', 'Your Group is Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('dashboard.group.edit', [
            'title' => "Edit Group",
            'group' => $group,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {

        $request->validate([
            'name_group' => 'required|max:255',
            // 'user_id' => 'required|array'
        ]);

        $group->update([
            'name_group' => $request->name_group
        ]);

        // $group->users()->sync($request->user_id);

        return redirect('/group')->with('success', 'Your Group is Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
