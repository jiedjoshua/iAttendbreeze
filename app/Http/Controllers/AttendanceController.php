<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Attendance;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    //

    public function showAttendanceTable($teacherId, $subjectId, $sectionId = null)
    {
        $teacher = Teacher::find($teacherId);
        $subject = Subject::find($subjectId);
    
        if ($sectionId) {
            $section = Section::with('students')->find($sectionId);
    
            // Use the accessor to get the full name for each student
            $section->students->each(function ($student) {
                $student->full_name = $student->full_name;
            });
    
            $students = $section->students;
    
            return view('teacher.assigned_subject', compact('teacher', 'subject', 'section', 'students'));
        } else {
            // Handle the case when sectionId is not provided
            return redirect()->route('teacherDashboard'); // Redirect to the teacher dashboard or handle as needed
        }


        
    }

    

    public function updateAttendance(Request $request, $student_id, $subject_id)
    {
        $status = substr($request->path(), strrpos($request->path(), '/') + 1);
    
        // Set the timezone to Asia/Manila
        $now = Carbon::now('Asia/Manila');
    
        // Check if an attendance record already exists for the student, subject, and date
        $existingAttendance = Attendance::where('student_id', $student_id)
            ->where('subject_id', $subject_id)
            ->whereDate('date', $now->toDateString())
            ->first();
    
        if ($existingAttendance) {
            // Attendance record already exists, update it
            $existingAttendance->status = $status;
            $existingAttendance->time = $now;
            $existingAttendance->save();
        } else {
            // Attendance record doesn't exist, create a new one
            $newAttendance = new Attendance();
            $newAttendance->student_id = $student_id;
            $newAttendance->subject_id = $subject_id;
            $newAttendance->date = $now->toDateString();
            $newAttendance->time = $now;
            $newAttendance->status = $status;
            $newAttendance->save();
        }
    
        return redirect()->back();
    }
    


    
}

    

