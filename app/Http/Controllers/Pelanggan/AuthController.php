<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard(session()->get('role'))->user() != null) {
            return redirect()->route(session()->get('role').'.index');
        }
        return view('auth.pelanggan.login');
    }

    public function validator(Request $request)
    
    {

        $rules = [
            'email' => 'required|string|exists:' . 'pelanggan' . ',email',
            'password' => 'required|string',
            'role' => 'required|string'
        ];

        $messages = [
            'email.exists' => 'Identitas tersebut tidak cocok dengan data kami.',
        ];

        $request->validate($rules, $messages);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (session()->has('role')) {
            Auth::guard(session()->get('role'))->logout();
            session()->flush('role');
        }

        if (Auth::guard('pelanggan')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            session()->put('role', 'pelanggan');
            return redirect()->route('pelanggan.index')
                ->with('status', 'Selamat datang!'); 
        }
        
        return redirect()->back()->withErrors(['email' => 'Identitas tersebut tidak cocok dengan data kami.']);
    }

    public function logout()
    {
        Auth::guard(session()->get('role'))->logout();
        session()->flush();
        return redirect('/')
            ->with('status', 'Anda telah keluar!');
    }
}
