<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
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
    public function studentDashboard()
    {
        return view('student.dashboard', [
            'title' => 'Dashboard Siswa',
            'subtitle' => 'Dashboard'
        ]);
    }
}
