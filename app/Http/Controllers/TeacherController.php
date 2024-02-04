<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function teacherDashboard()
    {
        $subjectCount = $this->getSubjectCount();

        return view('teacher.teacher_dashboard', compact('subjectCount'));
    }

    public function showSubjects()
    {
        $teacher = $this->getCurrentTeacherWithSubjects();

        return view('teacher.teacher_subjects', compact('teacher'));
    }

    public function assignedSubject(Request $request, $teacherId, $subjectId)
    {
        // Now $teacherId and $subjectId contain the values from the URL
        // You can use them as needed in your controller logic
    
        // Example:
        $teacher = Teacher::find($teacherId);
        $subject = Subject::find($subjectId);
    
        // Your logic here...
    
        // Pass data to the view if needed
        return view('teacher.assigned_subject', ['teacher' => $teacher, 'subject' => $subject]);
    }


    public function accountSettings()
    {
        return view('teacher.teacher_account');
    }




    ///////////////////////////////////////////////////////////////////////

    private function getSubjectCount()
    {
        $teacher = $this->getCurrentTeacher();

        return optional($teacher)->subjects->count() ?? 0;
    }

    private function getCurrentTeacherWithSubjects()
    {
        $teacher = $this->getCurrentTeacher();

        return $teacher ? $teacher->load('subjects') : null;
    }

    private function getCurrentTeacher()
    {
        $teacherId = auth()->user()->teacher_id;

        return Teacher::find($teacherId);
    }
}
