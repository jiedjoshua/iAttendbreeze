<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getFullNameAttribute()
    {
        return $this->lastname . ', ' . $this->firstname;
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAttendanceCounts()
    {
        return $this->attendances()
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
    }

    public function attendanceChart()
{
    // Initialize an array with 12 zeros
    $attendanceCounts = array_fill(0, 12, 0);

    // Get the attendance records for this student
    $attendanceRecords = $this->attendances;

    // Loop through the attendance records
    foreach ($attendanceRecords as $record) {
        // Check if the attendance status is 'present'
        if ($record->status == 'present') {
            // Get the month of the attendance date (subtract 1 because months are zero-indexed in JavaScript)
            $month = date('n', strtotime($record->date)) - 1;

            // Increment the count for this month
            $attendanceCounts[$month]++;
        }
    }

    return $attendanceCounts;
}


    

    
    
}
