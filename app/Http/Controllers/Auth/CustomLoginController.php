<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
    	$email	       = $request->email;
    	$password      = $request->password;
    	$rememberToken = $request->remember;

		if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
			$msg = [
				'status'  => 'success',
                'message' => 'Logado com sucesso!',
                'error'   => ''
            ];
			return response()->json($msg);
		} else {
			$msg = [
				'status'  => 'error',
                'message' => 'Ops, falha ao logar!',
                'error'   => 'E-mail ou Senha inválidos!'
            ];
			return response()->json($msg);
		}
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }
}
