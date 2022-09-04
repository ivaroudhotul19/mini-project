<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('dashboard.admin.matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.matakuliah.create',[
            'matakuliah' => Matakuliah::all(),
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
            'kode_mk' => 'required|max:7|unique:matakuliah',
            'mk' => 'required',
            'sks' => 'required|integer|min:1|max:4',
        ]);

        Matakuliah::create($validatedData);
        Alert::success('Berhasil menambahkan matakuliah', 'Matakuliah telah berhasil dibuat');
        return redirect('/dashboard/matakuliah');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view('dashboard.admin.matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $rules = [
            'mk' => 'required',
            'sks' => 'required|integer|min:1|max:4',
        ];

        if ($request->kode_mk != $matakuliah->kode_mk) {
            $rules['kode_mk'] = 'required|max:7|unique:matakuliah';
        }

        $validatedData = $request->validate($rules);

        $matakuliah->update($validatedData);

        Alert::success('Berhasil mengubah matakuliah', 'Matakuliah telah berhasil diubah');
        return redirect('/dashboard/matakuliah');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        Matakuliah::destroy($matakuliah->id);
        Alert::success('Berhasil menghapus matakuliah', 'Matakuliah telah berhasil dihapus');
        return redirect('/dashboard/matakuliah'); 
    }

    public function print()
    {
        $matakuliah = Matakuliah::get();
        $pdf = Pdf::loadview('dashboard.admin.matakuliah.print', 
            ['matakuliah'=>$matakuliah])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-matakuliah.pdf');
    }
}
