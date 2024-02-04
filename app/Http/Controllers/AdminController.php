<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;


class AdminController extends Controller
{
    public function adminDashboard()
    {
        $totalStudents = Student::count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalParents = User::where('role', 'parent')->count();
        $subjectsWithoutSection = Subject::whereNull('section_id')->count();

        return view('admin.admin_dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalParents'  => $totalParents,
            'subjectsWithoutSection' => $subjectsWithoutSection,
        ]);
    
    }

    public function announcement()
    {
        return view('admin.announcement');
    }

    public function publishAnnouncement()
    {
       return view('admin.admin_publish');
    }

    public function accountSettings()
    {
        return view('admin.admin_account');
    }

    public function teacher(){
        $teachers = User::where('role', 'teacher')->get();

        return view('admin.admin_teacher', ['teachers' => $teachers]);
    }
}
