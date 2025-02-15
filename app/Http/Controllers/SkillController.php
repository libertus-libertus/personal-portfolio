<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'icon' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'name.required' => 'Keahlian tidak boleh kosong!',
                'icon.required' => 'Ikon/software tidak boleh kosong!',
            ]
        );

        // Upload icon
        $icon_imageName = null;
        if ($request->hasFile('icon')) { // periksa apakah ada gambar yang diupload
            $image = $request->file('icon'); // ambil file gambar dari inputan/request
            $icon_imageName = time().'.'.$image->getClientOriginalExtension(); // generate nama file gambar
            $image->move(public_path('images/icons'), $icon_imageName); // proses simpan file gambar
        }

        Skill::create([
            'name' => $request->name,
            'icon' => $icon_imageName,
        ]);

        return redirect()->route('skill.index')
            ->with('success', 'Skill berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Keahlian tidak boleh kosong!']
        );

        // Upload icon
        $icon_imageName = $skill->icon; // ambil value icon dari table skill
        if ($request->hasFile('icon')) { // periksa apakah ada gambar yang diupload
            if ($skill->icon) {
                unlink(public_path('images/icons/'.$skill->icon));
            }
            $image = $request->file('icon'); // ambil file gambar dari inputan/request
            $icon_imageName = time().'.'.$image->getClientOriginalExtension(); // generate nama file gambar
            $image->move(public_path('images/icons'), $icon_imageName); // proses simpan file gambar
        }

        $skill->update([
            'name' => $request->name,
            'icon' => $icon_imageName,
        ]);

        return redirect()->route('skill.index')
            ->with('success', 'Skill berhasil diperbahrui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        // Hapus gambar ikon
        if ($skill->icon) {
            unlink(public_path('images/icons/'.$skill->icon));
        }
        $skill->delete();

        return redirect()->route('skill.index')
            ->with('success', 'Skill berhasil dihapus!');
    }
}
