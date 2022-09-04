<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;


class AdminMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $user = User::all();
        return view('dashboard.admin.mahasiswa.index', compact('mahasiswa', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.admin.mahasiswa.create',[
            'mahasiswa' => Mahasiswa::all(),
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
        $user = $this->validate($request,[
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $user['password'] = Hash::make($user['password']);
        User::create($user);

        $mahasiswa = $this->validate($request, [
            'user_id' => 'unique:mahasiswa|unique:users',
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'jns_kelamin' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:255',
        ] );

        $mahasiswa['image'] = $request->file('image')->store('mahasiswa-images', 'public');

        $user_id = User::where('email',  $user['email'])->first()->id;
        $mahasiswa['user_id'] = $user_id;

        Mahasiswa::create($mahasiswa);
        Alert::success('Berhasil menambahkan mahasiswa', 'Mahasiswa telah berhasil dibuat');
        return redirect('/dashboard/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa, Nilai $nilai)
    {
        return view('dashboard.admin.mahasiswa.show', compact('mahasiswa', 'nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $user = User::find($mahasiswa->user_id);
        
        $rules = [
            'username' => 'required',
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        if($request->password != '') {
            $rules['password'] = 'min:5';
        }
        
        $validatedData = $request->validate($rules);

        if($request->password) {  
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $validatedData['password'] = $user->password;

        
        $user->update($validatedData);

        $data = [
            'nama' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'jns_kelamin' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|max:255',
        ];

        if($request->nim != $mahasiswa->nim){
            $data['nim'] = 'required|max:7|unique:mahasiswa';
        }

        if($request->user_id != $mahasiswa->user_id){
            $data['user_id'] = 'unique:mahasiswa|unique:users';
        }

        $validated = $request->validate($data);

        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('mahasiswa-images', 'public');
            
            if($mahasiswa->image) {
                Storage::disk('public')->delete($mahasiswa->image);
            }
        } 

        $mahasiswa->update($validated);

        Alert::success('Berhasil mengubah mahasiswa', 'Mahasiswa telah berhasil diubah');
        return redirect('/dashboard/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $user = User::find($mahasiswa->user_id);
        $user->delete();

        if($mahasiswa->image) {
            Storage::delete($mahasiswa->image);
        }

        Mahasiswa::destroy($mahasiswa->id);
        Alert::success('Berhasil menghapus mahasiswa', 'Mahasiswa telah berhasil dihapus');
        return redirect('/dashboard/mahasiswa');
    }

    public function print()
    {
        $mahasiswa = Mahasiswa::get();
        $pdf = Pdf::loadview('dashboard.admin.mahasiswa.print', 
            ['mahasiswa'=>$mahasiswa])->setOptions(['defaultFont' => 'sans-serif']
        );
        return $pdf->download('data-mahasiswa.pdf');
    }

    public function print_detail(Mahasiswa $mahasiswa) {
        $image = Storage::get('public/'. $mahasiswa->image);
        $img_to_base64 = base64_encode($image);

        $pdf = PDF::loadview('dashboard.admin.mahasiswa.print-detail', compact('mahasiswa', 'img_to_base64'));
        
        return $pdf->download('detail-mahasiswa.pdf');
    }
}
