<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $user = User::count();
        $mahasiswa = Mahasiswa::count();
        $matakuliah = Matakuliah::count();
        $nilai = Nilai::count();
        return view('dashboard.admin.main.main', 
            compact('user', 'mahasiswa', 'matakuliah','nilai')
        );
    }
}
