<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
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

}
