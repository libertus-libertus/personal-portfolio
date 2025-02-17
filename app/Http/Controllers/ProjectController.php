<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
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
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string',
            'github_link' => 'required|url',
            'live_link' => 'nullable|url'
        ], [
            'title.required' => 'Judul proyek harus diisi.',
            'role.required' => 'Posisi proyek harus diisi.',
            'image.required' => 'Gambar proyek harus diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus PNG, JPG, atau JPEG.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'start_date.required' => 'Tanggal mulai proyek harus diisi.',
            'end_date.required' => 'Tanggal selesai proyek harus diisi.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
            'description.required' => 'Deskripsi proyek harus diisi.',
            'github_link.required' => 'Link GitHub proyek harus diisi.',
            'github_link.url' => 'Format link GitHub tidak valid.',
            'live_link.url' => 'Format link hosting tidak valid.'
        ]);

        $project_imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $project_imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $project_imageName);
        }

        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'role' => $request->role,
            'image' => $project_imageName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'live_link' => $request->live_link
        ]);

        return redirect()->route('project.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string',
            'github_link' => 'required|url',
            'live_link' => 'nullable|url'
        ], [
            'title.required' => 'Judul proyek harus diisi.',
            'role.required' => 'Posisi proyek harus diisi.',
            'start_date.required' => 'Tanggal mulai proyek harus diisi.',
            'end_date.required' => 'Tanggal selesai proyek harus diisi.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
            'description.required' => 'Deskripsi proyek harus diisi.',
            'github_link.required' => 'Link GitHub proyek harus diisi.',
            'github_link.url' => 'Format link GitHub tidak valid.',
        ]);

        $project_imageName = $project->image;
        if ($request->hasFile('image')) {
            if ($project->image) {
                unlink(public_path('images/projects/'.$project->image));
            }
            $image = $request->file('image');
            $project_imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $project_imageName);
        }

        $project->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'role' => $request->role,
            'image' => $project_imageName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'live_link' => $request->live_link
        ]);

        return redirect()->route('project.index')
            ->with('success', 'Proyek berhasil diperbaharui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            unlink(public_path('images/projects/'.$project->image));
        }

        $project->delete();
        return redirect()->route('project.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }
}
