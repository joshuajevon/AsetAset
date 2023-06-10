<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        $user = Auth::user();

        if($user->isAdmin == 1){
            return redirect(route('admin-dashboard'));
        }else{
            return view('dashboard',[
                'user' => $request->user(),
            ]);
        }
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse{
        $user = $request->user();

        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->phone_number = $request->phone_number;
        $user->nickname = $request->nickname;
        $user->save();

        return Redirect::route('dashboard')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ],[
            'password.required' => 'Password harus diisi',
            'password.current_password' => 'Password anda salah'
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('/');
    }
}
