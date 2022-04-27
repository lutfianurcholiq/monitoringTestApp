<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TestScenario;


class DashboardController extends Controller
{
    public function index()
    {
        $success = TestScenario::where('result','success')->count();
        $bug = TestScenario::where('result','bug')->count();

        // $team = Group::where('id', auth()->user()->id)->first();

        // dd($team);

        return view('dashboard.index', [
            'users' => User::with('group')->get(),
            // 'groups' => Group::all(),
            // 'teams' => $team,
            // 'groups' => Group::where('id', Auth::user()->group_id)->first(),
            'success' => $success,
            'bug' => $bug
        ]);
        
    }
}
