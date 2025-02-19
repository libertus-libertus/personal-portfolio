<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProjects = Project::count();
        $totalSkills = Skill::count();
        $totalExperiences = Experience::count(); // Panggil model Experience
        $totalCategories = Category::count(); // Panggil model Experience

        // Ambil proyek terbaru (limit 5)
        $recentProjects = Project::latest()->take(5)->get();

        // Data untuk chart
        $years = Project::selectRaw('YEAR(start_date) as year')->groupBy('year')->pluck('year');
        $projectCounts = Project::selectRaw('YEAR(start_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->pluck('count');

        $skillNames = Skill::pluck('name');
        $skillCounts = Skill::withCount('projects')->pluck('projects_count');

        return view('dashboard', compact(
            'totalProjects', 'totalSkills', 'totalExperiences', 'totalCategories',
            'recentProjects', 'years', 'projectCounts', 'skillNames', 'skillCounts'
        ));
    }
}
