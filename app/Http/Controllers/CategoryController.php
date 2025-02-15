<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Kategori tidak boleh kosong']
        );

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            ['name' => 'required'],
            ['name.required' => 'Kategori tidak boleh kosong']
        );

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }

    public function printPDF() {
        $categories = Category::all();
        $company = [
            'name' => 'Growth With Lin',
            'phone' => '0812-3456-7890',
            'email' => 'info@growthwithlin.com',
            'address' => 'Jl. Sukses No. 123, Jakarta, Indonesia'
        ];

        $pdf = Pdf::loadView('category.report', compact('categories', 'company'))
            ->setPaper('a4', 'portrait');

        // Menambahkan nomor halaman menggunakan callback DOMPDF
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $text = "Halaman $pageNumber dari $pageCount";
            $font = $fontMetrics->get_font("Arial", "normal");
            $canvas->text(500, 820, $text, $font, 10);
        });

        return $pdf->download('laporan_kategori.pdf');
    }
}
