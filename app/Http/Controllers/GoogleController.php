<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //redirect google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //handle callback from google account
    public function handleGoogleCallback(Request $request)
    {
        try {
            //get data user from google account
            $user = Socialite::driver('google')->user();
            // dd($user);

            //mencari data google_id pada akun apakah sudah terdaftar atau belum
            $existingUser = User::where('google_id', $user->id)->first();
            // dd($existingUser);

            if ($existingUser) :

                //jika akun sudah terdaftar maka akan mengambil data sesuai google_id dan diarahkan ke dashboard
                // Auth::login($existingUser);

                // $role = Role::where('id', $existingUser->role_id)->first();
                // $request->session()->put('role', $role->role);

                return redirect('/')->with(['danger' => 'Email sudah terdaftar']);



            else :
                //jika akun belum terdaftar maka akan membuat user baru sesuai google_id ditambahkan ke db
                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->role = 'user';
                $newUser->password = bcrypt('password');
                $newUser->save();

                // $request->session()->put('role', $role->role);
                // Auth::login($newUser);
                return redirect('/')->with(['success' => 'Silahkan cek email!']);

            endif;
        } catch (\Throwable $th) {
            //kembalikan ke halaman login jika belum punya akun
            return redirect('/');
        }
    }
}
