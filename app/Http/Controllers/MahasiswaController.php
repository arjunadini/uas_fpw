<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $sortColumn = $request->get('sort', 'id'); // Default sort berdasarkan 'id'
    $sortOrder = $request->get('order', 'asc'); // Default 'asc' jika tidak ada parameter

    $mahasiswa = Mahasiswa::orderBy($sortColumn, $sortOrder)->get();

    return view('dashboard', compact('mahasiswa', 'sortColumn', 'sortOrder'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form tambah data mahasiswa
        return view('mahasiswa.mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'npm' => 'required|unique:mahasiswa|max:15',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        Mahasiswa::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required|max:20',
            'nama' => 'required|max:255',
            'prodi' => 'required|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil dihapus!');
    }

    // fungsi untuk eksport ke excel
    public function exportExcel (){
    return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

     // Fungsi untuk ekspor ke PDF
     public function exportPdf()
     {
         // Mengambil data mahasiswa
         $mahasiswa = Mahasiswa::all();
 
         // Memanggil view yang akan di-render sebagai PDF
         $pdf = FacadePdf::loadView('mahasiswa.pdf', compact('mahasiswa'));
 
         // Menyimpan atau mengunduh PDF
         return $pdf->download('mahasiswa.pdf');
     }
}

