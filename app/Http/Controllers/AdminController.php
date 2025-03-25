<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());

        $admin->password = Hash::make($request->password);

        $admin->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    public function updateDetails(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:25',
            'email'=>'required|email',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());
        $admin->name=$request->name;
        $admin->email=$request->email;

        $admin->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
