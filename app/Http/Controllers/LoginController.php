<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    { // ログイン画面
        return view('login.index');
    }
      // ログイン処理
    public function login(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'ユーザーIDは必須です。',
                'email.email' => '有効なメールアドレスを入力してください。',
                'password.required' => 'パスワードは必須です。',
            ]
        );

        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()
            ->withErrors([
                'login' => 'メールアドレスまたはパスワードが違います。',
            ])
            ->onlyInput('email'); 
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}