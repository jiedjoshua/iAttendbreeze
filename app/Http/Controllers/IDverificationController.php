<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Models\Teacher;
use App\Models\User;

class IDverificationController extends Controller
{
    public function showTeacher()
    {
        return view('idverification.teacher');
    }

    public function showParent()
    {
        return view('idverification.parent');
    }

    public function checkStudent(Request $request)
    {
    $studentId = $request->input('student_id');
    $firstname = $request->input('firstname');
    $lastname = $request->input('lastname');
    $role = "parent";

    // Check if the student with the given ID exists
    $student = Student::find($studentId);

    if (!$student) {
        // Student does not exist
        return redirect()->back()->with('error', 'Student does not exist');
    }

    // Check if the maximum number of parent accounts is reached for the student
    $maxParentAccounts = 2; // Set your desired limit here
    $existingParentAccounts = User::where('student_id', $studentId)->where('role', 'parent')->count();

    if ($existingParentAccounts >= $maxParentAccounts) {
        return redirect()->back()->with('error', 'Maximum number of parent accounts reached for this student');
    }

    // If the student exists and the limit is not reached, proceed with storing information in the session
    Session::put('student_id', $student->id);
    Session::put('firstname', $firstname);
    Session::put('lastname', $lastname);
    Session::put('role', $role);

    return redirect()->route('register.parent');
    }


    public function checkTeacher(Request $request)
    {
        $teacherId = $request->input('teacher_id');
    
        // Check if the teacher with the given ID already exists in the users table
        $existingUser = User::where('teacher_id', $teacherId)->where('role', 'teacher')->first();
    
        if ($existingUser) {
            // Teacher with the same ID already exists
            return redirect()->back()->with('error', 'Teacher with this ID already exists');
        }
    
        // If the teacher doesn't exist in the users table, proceed with storing information in the session
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $role = "teacher";
    
        Session::put('teacher_id', $teacherId);
        Session::put('firstname', $firstname);
        Session::put('lastname', $lastname);
        Session::put('role', $role);
    
        return redirect()->route('register.teacher');
    }
}
