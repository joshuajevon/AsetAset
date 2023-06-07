<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'nickname' => ['required','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:8','regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/', Rules\Password::defaults(),'confirmed'],
            'password_confirmation' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'gender' => ['required'],
        ];

        $messages = [
            'name.required' => 'Nama Lengkap harus diisi',
            'nickname.required' => 'Nama Panggilan harus diisi',
            'nickname.min' => 'Nama Panggilan harus diisi minimal 3 huruf',
            'email.required' => 'Alamat email harus diisi',
            'email.email' => 'Alamat email harus valid',
            'email.unique' => 'Alamat email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus diisi minimal 8 huruf',
            'password.regex' => 'Password tidak memenuhi syarat',
            'password.confirmed' => 'Konfirmasi Password tidak sama',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'phone_number.required' => 'Nomor Handphone harus diisi',
            'phone_number.numeric' => 'Nomor Handphone harus dalam angka',
            'gender.required' => 'Jenis Kelamin harus diisi'
        ];

        $request->validate($rules, $messages);

        $user = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
