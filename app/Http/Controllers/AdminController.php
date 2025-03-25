<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function checkOldPassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!$request->old_password) {
            return response()->json(['valid' => false]);
        }

        return response()->json([
            'valid' => Hash::check($request->old_password, $admin->password)
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        if (!Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $admin->password = Hash::make($request->password);

        $admin->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
