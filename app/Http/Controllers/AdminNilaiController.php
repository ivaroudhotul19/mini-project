<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.nilai.index',[
            'angka' => Nilai::all(),
            'mahasiswa' => Mahasiswa::all(),
            'matakuliah' => Matakuliah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.nilai.create',[
            'nilai' => Nilai::all(),
            'mahasiswa' => Mahasiswa::all(),
            'matakuliah' => Matakuliah::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'matakuliah_id' => 'required',
            'nilai' => 'required',
        ]);

        Nilai::create($validatedData);
        Alert::success('Berhasil menambahkan nilai', 'Nilai telah berhasil dibuat');
        return redirect('/dashboard/nilai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('dashboard.admin.nilai.edit',[
            'mahasiswa' => Mahasiswa::all(),
            'matakuliah' => Matakuliah::all()
        ],compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $rules = [
            'mahasiswa_id' => 'required',
            'matakuliah_id' => 'required',
            'nilai' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $nilai->update($validatedData);

        Alert::success('Berhasil mengubah nilai', 'Nilai telah berhasil diubah');
        return redirect('/dashboard/nilai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        Nilai::destroy($nilai->id);
        Alert::success('Berhasil menghapus nilai', 'Nilai telah berhasil dihapus');
        return redirect('/dashboard/nilai'); 
    }

    public function print()
    {
        $angka = Nilai::get();
        $pdf = Pdf::loadview('dashboard.admin.nilai.print', 
            ['angka'=>$angka])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-nilai.pdf');
    }
}
