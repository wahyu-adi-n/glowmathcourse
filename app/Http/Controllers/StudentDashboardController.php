<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StudentDashboardController extends Controller
{
    public function index() {
        return view('student.dashboard', ['title'=> 'Glowmathcourse']);
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
