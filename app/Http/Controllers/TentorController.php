<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tentor;

class TentorController extends Controller
{
    public function index()
    {
        // $tentor_with_user = Users::
        // return view('admin.tentor.index', [
        //     'title' => 'Daftar Tentor',
        //     'tentors' => Tentor::with('user')->get(),
        // ]);
        return @dd(
            Tentor::all()->)join
        );
    }

    public function show(Tentor $tentor)
    {
        return view('admin.tentor.show', [
            'title' => 'Detail Tentor',
            'tentor' => $tentor,
        ]);
    }
}
