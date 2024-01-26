<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Models\Teacher;

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
        $lastname = $request->input('lastname'); // Assuming 'student_id' is the name of the input field
        $role = "parent";

        // Check if the student with the given ID exists
        $student = Student::find($studentId);

        if ($student) {
            // Student exists
            Session::put('student_id', $student->id);
            Session::put('firstname', $firstname);
            Session::put('lastname', $lastname);
            Session::put('role', $role);

            return view('auth.register');
        } else {
            // Student does not exist
            return abort(403,'Student does not exist');
        }
    }

    public function checkTeacher(Request $request)
    {
        $teacherId = $request->input('teacher_id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname'); // Assuming 'student_id' is the name of the input field
        $role = "teacher";

        // Check if the student with the given ID exists
        $teacher = Teacher::find($teacherId);

        if ($teacher) {
            // Student exists
            Session::put('teacher_id', $teacher->id);
            Session::put('firstname', $firstname);
            Session::put('lastname', $lastname);
            Session::put('role', $role);

            return view('auth.register-teacher');
        } else {
            // Student does not exist
            return abort(403,'Teacher does not exist');
        }
    }
}
