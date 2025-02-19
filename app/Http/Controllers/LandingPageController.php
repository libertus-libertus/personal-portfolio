<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use App\Models\User;

class LandingPageController extends Controller
{
    public function index()
    {
        $user = User::first();
        $experiences = Experience::with('skills')->latest()->take(2)->get();
        $projects = Project::with('skills')->latest()->take(2)->get();
        return view('index', compact('projects', 'experiences', 'user'));
    }

    public function listProject()
    {
        $projects = Project::with('skills')->orderByDesc('start_date')->get();
        return view('list_projects', compact('projects'));
    }

    public function contact()
    {
        $user = User::first();
        return view('contact', compact('user'));
    }
}
