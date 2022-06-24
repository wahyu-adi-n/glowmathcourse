<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function siswaDashboard()
    {
        return view('siswa.dashboard', [
            'title' => 'Siswa Dashboard | Glowmath Course'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Admin Dashboard | Glowmath Course '
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tentorDashboard()
    {
        return view('tentor.dashboard', [
            'title' => 'Tentor Dashboard | Glowmath Course'
        ]);
    }
}
