<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if(!$user) {
            return back()
                ->withErrors(['email' => 'Email não encontrado.'])
                ->onlyInput('email');
        }

        if(Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended()->with('success', 'Bem vindo de volta!.');
        }

        return back()
            ->withErrors(['password' => 'A senha está incorreta.'])
            ->onlyInput('email');
    }
}
