<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'position' => 'required|max:255',
                'company' => 'required|max:255',
                'employment_type' => 'required|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'location' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'position.required' => 'Posisinya sebagainya apa?',
                'company.required' => 'Nama perusahaannya sebelumnya',
                'employment_type.required' => 'WFH (Work From Home) atau Di kantor?',
                'start_date.required' => 'Tanggal mulai bekerja harus diisi.',
                'end_date.required' => 'Tanggal selesai bekerja harus diisi.',
                'end_date.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
                'location.required' => 'Lokasi perusahaan tempat bekerja',
                'description.required' => 'Deskripsi pekerjaanya tidak boleh kosong',
            ]
        );

        Experience::create([
            'user_id' => Auth::id(),
            'position' => $request->position,
            'company' => $request->company,
            'employment_type' => $request->employment_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'description' => $request->description
        ]);

        return redirect()->route('experience.index')
            ->with('success', 'Pengalaman kerja berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate(
            [
                'position' => 'required|max:255',
                'company' => 'required|max:255',
                'employment_type' => 'required|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'location' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'position.required' => 'Posisinya sebagainya apa?',
                'company.required' => 'Nama perusahaannya sebelumnya',
                'employment_type.required' => 'WFH (Work From Home) atau Di kantor?',
                'start_date.required' => 'Tanggal mulai bekerja harus diisi.',
                'end_date.required' => 'Tanggal selesai bekerja harus diisi.',
                'end_date.after_or_equal' => 'Tanggal selesai tidak boleh lebih awal dari tanggal mulai.',
                'location.required' => 'Lokasi perusahaan tempat bekerja',
                'description.required' => 'Deskripsi pekerjaanya tidak boleh kosong',
            ]
        );

        $experience->update($request->all());
        return redirect()->route('experience.index')
            ->with('success', 'Pengalaman kerja berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experience.index')
            ->with('success', 'Pengalaman kerja berhasil dihapus!');
    }
}
