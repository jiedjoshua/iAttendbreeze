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
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function viewParent(): View
    {
        return view('auth.register');
    }

    public function viewTeacher(): View
    {
        return view('auth.register-teacher');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function storeParent(Request $request): RedirectResponse
    {

        $studentId = session('student_id');
        $firstname = session('firstname');
        $lastname = session('lastname');
        $role = session('role');

        $request->validate([
          
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

    
        $user = User::create([
            'firstname'  => $firstname,
            'lastname' => $lastname,
            'student_id' => $studentId,
            'role' => $role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::forget('student_id');
        Session::forget('firstname');
        Session::forget('lastname');
        Session::forget('role');

        event(new Registered($user));

        Auth::login($user);

        return redirect('/parent/dashboard');
    }

    public function storeTeacher(Request $request): RedirectResponse
    {
        $request->validate([
        
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $teacherId = session('teacher_id');
        $firstname = session('firstname');
        $lastname = session('lastname');
        $role = session('role');

        $user = User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'teacher_id' => $teacherId,
            'role' => $role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::forget('teacher_id');
        Session::forget('firstname');
        Session::forget('lastname');
        Session::forget('role');

        event(new Registered($user));

        Auth::login($user);

        return redirect('/teacher/dashboard');
    }
}
