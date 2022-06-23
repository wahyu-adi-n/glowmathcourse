<?php

namespace App\Http\Controllers;

use Enums\UserLevel;
use App\Models\Siswa;
use App\Models\Tentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

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
            'title' => 'Glowmathcourse'
        ]);
    }

    public function register(){
        return view('register',[
            'title' => 'Glowmathcourse'
        ]);
    }

    public function loginProcess(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->level == UserLevel::Admin) {
                return redirect()->route('admin.dashboard')->with('success', 'Login kamu berhasil!');
            }else if (auth()->user()->level == UserLevel::Tentor) {
                return redirect()->route('tentor.dashboard')->with('success', 'Login kamu berhasil!');
            }else if (auth()->user()->level == UserLevel::Siswa){
                return redirect()->route('siswa.dashboard')->with('success', 'Login kamu berhasil!');
            } else {
                return back()->with('fail','Email dan Password kamu salah!');
            }
        }else{
            return back()->with('fail','Email dan Password kamu salah!');
        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email:dns|unique:users|unique:tentors|unique:siswas',
            'password' => 'required|min:8'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ];

        if (Tentor::create($data)) {
            return redirect()->route('login')->with('success','Pendaftaran kamu berhasil!');
        } else if(Siswa::create($data)) {
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
        return redirect('/');
    }
}
