<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function parentDashboard()
    {

    $parent = Auth::user();
    $studentId = $parent->student_id;
    $student = Student::find($studentId);
    $attedance = [];
    $attendance['present'] = $student->attendanceChart();

    if (!$student) {
      
        return response()->json(['error' => 'Student not found'], 404);
    }

    $attendanceCounts = $student->getAttendanceCounts();

    return view('parent.parent_dashboard', compact('student', 'attendanceCounts', 'attendance'));
    }

    public function accountSettings()
    {
        return view('parent.parent_account');
    }

    
}
