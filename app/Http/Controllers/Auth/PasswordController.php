<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'current_password' => ['required', 'current_password'],
            'password' => ['required','min:8','regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required']
        ];

        $messages = [
            'current_password.required' => 'Password lama harus diisi',
            'current_password.current_password' => 'Password lama yang anda tulis salah',
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password minimal 8 huruf',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'password_confirmation.required' => 'Konfirmasi Password baru harus diisi',
        ];

        $validated = $request->validateWithBag('updatePassword',$rules, $messages);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
