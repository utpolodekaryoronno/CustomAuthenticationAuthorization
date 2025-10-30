<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class StudentController extends Controller
{
    // 🏠 Home Page
    public function index()
    {
        return view('index');
    }

    // 📝 Registration Page
    public function showRegister()
    {
        return view('student.register');
    }

    // 🔐 Register Store
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'username'  => 'required|alpha_dash|unique:students',
            'email'     => 'required|email|unique:students',
            'phone'     => 'required|numeric',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new student
        $student = Student::create([
            'name'     => $request->name,
            'username'     => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'student', // default role
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful!');
    }

    // 🔓 Login Page
    public function showLogin()
    {
        return view('student.login');
    }

    // 🧾 Login Store
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email|exists:students',
            'password' => 'required|min:6',
        ]);

        Auth::guard('student')->attempt($credentials);


        if(Auth::guard('student')->attempt($credentials)){
            // $request->session()->regenerate();
            return redirect()->route('profile')->with('success', 'Login Successful!');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    // 👤 Profile Page
    public function profile()
    {
        return view('student.profile');
    }

    // 🚪 Logout
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
