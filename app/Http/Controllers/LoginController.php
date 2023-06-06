<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Mail;
use PDF;

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


            $data = [
                'user' => $newUser,
                'email' => $newUser->email,
                'client_name' => $newUser->name,
                'subject' => 'Tiket Online',
                'qrcode' => QrCode::size(400)->generate($request->name),
            ];

            // $qrcode = QrCode::size(400)->generate($data["email"]);
            $pdf = PDF::loadView('mail.tiket', $data)->setPaper('a4', 'landscape');


            try {
                Mail::send('mail.tiket', $data, function ($message) use ($data, $pdf) {
                    $message->to($data["email"], $data["client_name"])
                        ->subject($data["subject"])
                        ->attachData($pdf->output(), "Tiket Online.pdf");
                });

                $newUser->save();
                return redirect()->back()->with(['success' => 'Silahkan cek email!']);
            } catch (JWTException $exception) {
                return redirect()->back()->with(['danger' => 'Silahkan coba regis ulang!']);
            }

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
