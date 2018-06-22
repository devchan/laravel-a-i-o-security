<?php

namespace Devchan\LaravelAIOSecurity\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Devchan\LaravelAIOSecurity\Http\Requests\PasswordExpiredRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExpiredPasswordController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function expired()
    {
        return view('laravel-a-i-o-security::password.expired', compact('errors'));
    }

    public function postExpired(PasswordExpiredRequest $request)
    {
        // Checking current password
        if (!Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
        }

        $request->user()->update([
            'password' => bcrypt($request->password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back()->with(['status' => 'Password changed successfully']);
    }
}
