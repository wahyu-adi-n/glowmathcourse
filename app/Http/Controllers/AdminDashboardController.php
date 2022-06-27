<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Tentor;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
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
    public function adminDashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'subtitle' => 'Dashboard',
            'students_count' => Student::all()->count(),
            'tentors_count' => Tentor::all()->count(),
            'subjects_count' => Subject::all()->count(),
            'levels_count' => Level::all()->count()
        ]);
    }
}
