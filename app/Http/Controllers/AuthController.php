<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Tentor;
use App\Enums\UserLevel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Auth Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('login',[
            'title' => 'Login'
        ]);
    }

    public function register(){
        return view('register',[
            'title' => 'Register'
        ]);
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            if ($request->user()->level == UserLevel::admin->name) {
                return redirect()->route('admin.dashboard')->with('success', 'Login kamu berhasil!');
            }else if ($request->user()->level == UserLevel::tentor->name) {
                return redirect()->route('tentor.dashboard')->with('success', 'Login kamu berhasil!');
            }else if ($request->user()->level == UserLevel::siswa->name){
                return redirect()->route('siswa.dashboard')->with('success', 'Login kamu berhasil!');
            } else {
                return back()->with('fail','Email dan password kamu salah!');
            }
        }
        else{
            return back()->with('fail','Email dan password kamu salah!');
        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ];

        if ($request->level == UserLevel::tentor->value){
            $kode = 'TENTOR-'.Str::random(3);
            Tentor::create(['kode_tentor' => $kode]);
            $data['kode'] = $kode;
            User::create($data);
            return redirect()->route('login')->with('success','Pendaftaran kamu berhasil!');
        } else if ($request->level == UserLevel::siswa->value){
            $kode = 'SISWA-'.Str::random(3);
            Student::create(['kode_siswa' => $kode]);
            $data['kode'] = $kode;
            User::create($data);
            return redirect()->route('login')->with('success','Pendaftaran kamu berhasil!');
        } else if ($request->level == UserLevel::admin->value) {
            $kode = 'ADMIN-'.Str::random(3);
            $data['kode'] = $kode;
            User::create($data);
            return redirect()->route('login')->with('success','Pendaftaran kamu berhasil!');
        } else {
            return back()->with('fail','Pendaftaran kamu gagal!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
