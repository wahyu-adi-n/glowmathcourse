<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $queryBuilder = DB::table('students')
                            ->join('users', 'students.kode_siswa', '=', 'users.kode')->select('users.*', 'students.*')->get();
        return view('admin.siswa.index', [
            'title' => 'Daftar Siswa',
            'students' => $queryBuilder
        ]);
    }

    public function show($kode)
    {
        $siswa = DB::table('students')
                            ->join('users', 'students.kode_siswa', '=', 'users.kode')->select('users.*', 'students.*')
                            ->where('users.kode', '=', $kode)->get();

        return view('admin.siswa.show', [
            'title' => 'Detail Siswa',
            'student' => $siswa,
        ]);
    }
}
