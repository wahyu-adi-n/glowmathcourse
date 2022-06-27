<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TentorDashboardController extends Controller
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
    public function tentorDashboard()
    {
        return view('tentor.dashboard', [
            'title' => 'Dashboard Tentor',
            'subtitle' => 'Dashboard'
        ]);
    }
}
