<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{


    // 📝 Registration Page
    public function showRegisterStaff()
    {
        return view('staff.register');
    }

    // 🔐 Register Store
    public function registerStaff(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:staff',
            'email'     => 'required|email|unique:staff',
            'phone'     => 'required|numeric',
            'role'     => 'required',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new staff
        $staff = Staff::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.staff')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLoginStaff()
    {
        return view('staff.login');
    }

    // 🧾 Login Store
    public function loginStaff(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email|exists:staff',
            'password' => 'required|min:6',
        ]);

        Auth::guard('staff')->attempt($credentials);


        if(Auth::guard('staff')->attempt($credentials)){
            return redirect()->route('profile.staff')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    // 👤 Profile Page
    public function profileStaff()
    {
        return view('staff.profile');
    }

    // 🚪 Logout
    public function logoutStaff(Request $request)
    {
        Auth::guard('staff')->logout();

        return redirect()->route('login.staff')->with('success', 'Logged out successfully.');
    }
}
