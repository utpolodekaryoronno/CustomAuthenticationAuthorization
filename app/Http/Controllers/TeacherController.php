<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{


    // 📝 Registration Page
    public function showRegisterTeacher()
    {
        return view('teacher.register');
    }

    // 🔐 Register Store
    public function registerTeacher(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:staff',
            'email'     => 'required|email|unique:staff',
            'phone'     => 'required|numeric',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new teacher
        $teacher = Teacher::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => 'teacher', // default role
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.teacher')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLoginTeacher()
    {
        return view('teacher.login');
    }

    // 🧾 Login Store
    public function loginTeacher(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email|exists:teachers',
            'password' => 'required|min:6',
        ]);

        Auth::guard('teacher')->attempt($credentials);


        if(Auth::guard('teacher')->attempt($credentials)){
            return redirect()->route('profile.teacher')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    // 👤 Profile Page
    public function profileTeacher()
    {
        return view('teacher.profile');
    }

    // 🚪 Logout
    public function logoutTeacher(Request $request)
    {
        Auth::guard('teacher')->logout();

        return redirect()->route('login.teacher')->with('success', 'Logged out successfully.');
    }
}
