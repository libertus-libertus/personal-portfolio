<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $skills = Skill::all(); // Ambil semua skill dari database
        return view('experience.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'position' => 'required|max:255',
            'company' => 'required|max:255',
            'employment_type' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string',
            'description' => 'required|string',
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Simpan data pengalaman kerja
            $experience = Experience::create([
                'user_id' => Auth::id(),
                'position' => $request->position,
                'company' => $request->company,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
                'employment_type' => $request->employment_type,
                'description' => $request->description,
            ]);

            // Pastikan skills ada sebelum menyimpan ke pivot table
            if ($request->has('skills') && is_array($request->skills)) {
                $experience->skills()->sync($request->skills);
            }

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->route('experience.index')->with('success', 'Pengalaman kerja berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollback();

            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        $skills = Skill::all(); // Ambil semua skill dari database
        return view('experience.edit', compact('experience', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'position' => 'required|max:255',
            'company' => 'required|max:255',
            'employment_type' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'required|string',
            'description' => 'required|string',
            'skills' => 'required|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $experience->update($request->except(['skills']));

        if ($request->has('skills')) {
            $experience->skills()->sync($request->skills);
        }

        return redirect()->route('experience.index')
            ->with('success', 'Pengalaman kerja berhasil diperbarui!');
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
