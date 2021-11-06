<?php

namespace App\Exports;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrollmentExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function __construct(String $status, String $curriculum, int $grade_level)
    {
        $this->status = $status;
        $this->curriculum = $curriculum;
        $this->grade_level = $grade_level;
    }

    public function collection()
    {
        if ($this->status == 'All') {
            $data = Enrollment::select('students.roll_no', 'enrollments.curriculum', 'enrollments.state', 'enrollments.enroll_status', 'students.student_contact', 'students.mother_contact_no', 'students.father_contact_no', 'students.guardian_contact_no', DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"))
                ->join('students', 'enrollments.student_id', 'students.id')
                ->where('enrollments.grade_level', $this->grade_level)
                ->where('enrollments.school_year_id', Config::get('activeAY')->id)
                ->where('enrollments.curriculum', strtoupper($this->curriculum))
                ->get();
        } else {
            $data = Enrollment::select('students.roll_no', 'enrollments.curriculum', 'enrollments.state', 'students.student_contact', 'enrollments.enroll_status', 'students.mother_contact_no', 'students.father_contact_no', 'students.guardian_contact_no', DB::raw("CONCAT(student_lastname,', ',student_firstname,' ', student_middlename) AS fullname"))
                ->join('students', 'enrollments.student_id', 'students.id')
                ->where('enrollments.enroll_status', $this->status)
                ->where('enrollments.grade_level', $this->grade_level)
                ->where('enrollments.school_year_id', Config::get('activeAY')->id)
                ->where('enrollments.curriculum', strtoupper($this->curriculum))
                ->get();
        }
        return $data;
    }

    public function map($data): array
    {
        return [
            $data->roll_no,
            $data->fullname,
            $data->state,
            $data->curriculum,
            $data->enroll_status,
            $data->student_contact,
            $data->mother_contact_no,
            $data->father_contact_no,
            $data->guardian_contact_no
        ];
    }

    public function headings(): array
    {
        return [
            'LRN',
            'STUDENT NAME',
            'STATE',
            'CURRICULUM',
            'STATUS',
            'STUDENT CONTACT NO',
            'MOTHER CONTACT NO',
            'FATHER CONTACT NO',
            'GUARDIAN CONTACT NO'
        ];
    }
}
