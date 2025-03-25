<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPasswordMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class AdminForgotController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.admin.forgot');
    }
    public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:admins,email'
    ]);
    $token = Str::random(60);

    DB::table('admin_password_reset_tokens')->updateOrInsert(
        ['email' => $request->email],
        [
            'email' => $request->email,
            'token' => bcrypt($token),
            'created_at' => Carbon::now()
        ]
    );

    $resetUrl = url(route('password.adminReset', ['token' => $token, 'email' => $request->email], false));

    Mail::to($request->email)->send(new AdminResetPasswordMail($resetUrl));

    return redirect()->route('auth.adminLogin')->with('success', 'Password reset link sent! Check your email.');
}

}
