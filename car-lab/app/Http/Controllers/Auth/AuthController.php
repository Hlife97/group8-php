<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Notifications\UserRegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Mail, Storage};
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
            $request->validate([
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'phone' => ['required', 'numeric', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone  = $request->input('phone');
            $user->password = Hash::make($request->input('password'));

            if($request->hasfile('avatar')){
                $user->avatar = Storage::putFile('uploads/users/avatars', $request->file('avatar'));
            }

            $user->save();

            // 1 sms gonder
            // 2 mail gonder 1 ci adam 2 adam 3 adam // session database webservice

            $user->notify(new UserRegisterNotification());

//            Mail::to('codebyhidayet@gmail.com')->send(new RegisterMail($request->name));
//            Mail::to($request->email)->send(new RegisterMail($request->name));

            return redirect()->route('app.login');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
          $request->session()->regenerate();

          if(Auth::user()->role == 'admin')
              return redirect()->route('admin.dashboard');

          return redirect()->route('app.profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function profile(): View
    {
        $user = Auth::user();
        return view('front.profile', compact('user'));
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('app.login');
    }
}
