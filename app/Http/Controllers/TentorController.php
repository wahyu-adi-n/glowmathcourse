<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tentor;
use Illuminate\Support\Facades\DB;

class TentorController extends Controller
{
    public function index()
    {
        $queryBuilder = DB::table('tentors')
                            ->join('users', 'tentors.kode_tentor', '=', 'users.kode')->select('users.*', 'tentors.*')->get();
        return view('admin.tentor.index', [
            'title' => 'Daftar Tentor',
            'tentors' => $queryBuilder
        ]);
    }

    public function show($kode)
    {
        $tentor = DB::table('tentors')
                            ->join('users', 'tentors.kode_tentor', '=', 'users.kode')->select('users.*', 'tentors.*')
                            ->where('users.kode', '=', $kode)->get();

        return view('admin.tentor.show', [
            'title' => 'Detail Tentor',
            'tentor' => $tentor,
        ]);
    }
}
