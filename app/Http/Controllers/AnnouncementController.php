<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    public function showAnnouncements()
    {
        $userRole = auth()->user()->role; 
        $announcements = Announcement::orderBy('announcement_date', 'desc')->get();

       
        $viewName = 'announcement';

        if ($userRole == 'admin') {
            $viewName = 'admin.' . $viewName;
        } elseif ($userRole == 'teacher') {
            $viewName = 'teacher.' . $viewName;
        } elseif ($userRole == 'parent') {
            $viewName = 'parent.' . $viewName;
        }

        return view($viewName, ['announcements' => $announcements]);
    }

    public function submitAnnouncement(Request $request)
    {
       
        $request->validate([
            'subject' => 'required|string',
            'content' => 'required',
        ]);

        try {
            // Create a new announcement
            Announcement::create([
                'subject' => $request->input('subject'),
                'message' => $request->input('content'),
                'announcement_date' => now(), 
            ]);

            return redirect()->back()->with('success', 'Announcement published successfully.');
        } catch (\Exception $e) {
            Log::error('Error publishing announcement: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error publishing announcement. Please try again.');
        }
    }
}
