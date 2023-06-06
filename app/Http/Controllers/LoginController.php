<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        // $data['title'] = 'Register';
        // return view('sign/register', $data);
        return view('auth.admin');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $cekRole = User::where('email', $request->email)->first();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && $cekRole->role != 'user') :

            // $role = Role::where('id', Auth::user()->role_id)->first();
            // $request->session()->put('role', $role->role);
            return redirect('dashboard')
                ->with(['success' => 'Login']);
        endif;

        return redirect()->back()->with(['danger' => 'Login!']);
    }

    public function prosesregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $cekUser = User::where('email', $request->email)->first();

        if (!$cekUser) :
            $newUser = new User;
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->address = $request->address;
            $newUser->password = bcrypt('password');
            $newUser->role = 'user';
            $newUser->save();
            return redirect()->back()->with(['success' => 'Silahkan cek email!']);
        else :
            return redirect()->back()->with(['danger' => 'Email sudah terdaftar']);

        endif;
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
