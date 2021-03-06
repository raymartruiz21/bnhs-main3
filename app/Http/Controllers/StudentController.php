<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Helpers\Helper;
use App\Models\BackSubject;
use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    use Traits\StudentStatus;

    public function dashboard()
    {
        if (Auth::user()->completer == "Yes") {
            $enrolledData = Enrollment::join('students', 'enrollments.student_id', 'students.id', 'enrollments.grade_level')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                ->where('school_years.status', 1)
                ->where('enrollments.term', $this->activeTerm())
                ->where('students.id', Auth::user()->id)
                ->first();
        } else {
            $enrolledData = Enrollment::join('students', 'enrollments.student_id', 'students.id', 'enrollments.grade_level')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                ->where('school_years.status', 1)
                ->where('students.id', Auth::user()->id)
                ->first();
        }


        return view('student/dashboard', compact('enrolledData'));
    }

    public function store(Request $request)
    {
        if (isset($request->id)) {
            $dataret = Student::findOrFail($request->id);
            return $this->update($request, $dataret);
        } else {
            return Student::Create([
                'roll_no' => $request->roll_no,
                // 'curriculum' => empty($dataret->curriculum) ? $request->curriculum : $dataret->curriculum,
                'student_firstname' => $request->student_firstname,
                'student_middlename' => $request->student_middlename,
                'student_lastname' => $request->student_lastname,
                'date_of_birth' => $request->date_of_birth,
                'student_contact' => $request->student_contact,
                'gender' => $request->gender,
                'region' =>  $request->region,
                'province' =>  $request->province,
                'city' =>  $request->city,
                'barangay' =>  $request->barangay,
                'last_school_attended' => $request->last_school_attended,
                'last_schoolyear_attended' => $request->last_schoolyear_attended,
                'isbalik_aral' => !empty($request->last_schoolyear_attended) ? 'Yes' : 'No',
                'mother_name' => $request->mother_name,
                'mother_contact_no' => $request->mother_contact_no,
                'father_name' => $request->father_name,
                'father_contact_no' => $request->father_contact_no,
                'guardian_name' => $request->guardian_name,
                'guardian_contact_no' => $request->guardian_contact_no,
                'username' => Helper::create_username($request->student_firstname, $request->student_lastname),
                'orig_password' => Crypt::encrypt("bnhs"),
                'password' => Hash::make("bnhs"),
                'student_status' => null,
            ]);
        }
    }

    public function update($request, $dataret)
    {
        return Student::where('id', $request->id)->update([
            'roll_no' => $request->roll_no,
            'student_firstname' => $request->student_firstname,
            'student_middlename' => $request->student_middlename,
            'student_lastname' => $request->student_lastname,
            'date_of_birth' => $request->date_of_birth,
            'student_contact' => $request->student_contact,
            'gender' => $request->gender,
            'region' =>  $request->region_update,
            'province' =>  $request->province_update,
            'city' =>  $request->city_update,
            'barangay' =>  $request->barangay_update,
            'last_school_attended' => $request->last_school_attended,
            'last_schoolyear_attended' => $request->last_schoolyear_attended,
            'isbalik_aral' => !empty($request->last_schoolyear_attended) ? 'Yes' : 'No',
            'mother_name' => $request->mother_name,
            'mother_contact_no' => $request->mother_contact_no,
            'father_name' => $request->father_name,
            'father_contact_no' => $request->father_contact_no,
            'guardian_name' => $request->guardian_name,
            'guardian_contact_no' => $request->guardian_contact_no,
            'username' => empty($dataret->username) ? Helper::create_username($request->student_firstname, $request->student_lastname) : $dataret->username,
            'orig_password' => empty($dataret->orig_password) ? Crypt::encrypt("pnhs") : $dataret->orig_password,
            'password' => empty($dataret->password) ? Hash::make("pnhs") : $dataret->password,
            'student_status' => null,
        ]);
    }

    public function edit(Student $student)
    {
        return response()->json($student);
    }

    public function list()
    {
        $data = array();
        $sqlData = Student::select("*")->whereNotNull('orig_password')->get();
        foreach ($sqlData as $key => $value) {
            $arr = array();
            $arr['id'] = $value->id;
            $arr['roll_no'] = $value->roll_no;
            $arr['student_firstname'] = $value->student_firstname;
            $arr['student_middlename'] = $value->student_middlename;
            $arr['student_lastname'] = $value->student_lastname;
            $arr['student_contact'] = $value->student_contact;
            $arr['gender'] = $value->gender;
            $arr['username'] = $value->username;
            // $arr['orig_password'] = Crypt::decrypt($value->orig_password);
            $data[] = $arr;
        }
        // return $data;
        return response()->json(['data' => $data]);
    }
    // 
    public function studentList($level,$year)
    {
        if ($level == "all") {
            $data = Enrollment::select(
                "enrollments.*",
                "roll_no",
                "enrollments.curriculum",
                "students.isbalik_aral",
                "students.last_schoolyear_attended",
                "sections.section_name",
                "strands.strand",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )->orderBy('sections.section_name')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->leftjoin('strands', 'enrollments.strand_id', 'strands.id')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                // ->where('school_years.status', 1)
                ->where('school_years.id', $year)
                ->get();
        } else {
            $data = Enrollment::select(
                "enrollments.*",
                "roll_no",
                "enrollments.curriculum",
                "students.isbalik_aral",
                "students.last_schoolyear_attended",
                "sections.section_name",
                "strands.strand",
                DB::raw("CONCAT(students.student_lastname,', ',students.student_firstname,' ',students.student_middlename) as fullname")
            )->orderBy('sections.section_name')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->leftjoin('strands', 'enrollments.strand_id', 'strands.id')
                ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                // ->where('school_years.status', 1)
                ->where('school_years.id', $year)
                ->where('enrollments.grade_level', $level)
                ->get();
        }

        return response()->json(['data' => $data]);
    }

    public function destroy(Student $student)
    {
        return $student->delete();
    }

    public function profile()
    {
        return view('student/profile');
    }

    public function grade()
    {
        return view('student/grade');
    }


    public function gradeList($level, $section)
    {
        return response()->json(
            Grade::select(
                "grades.id as gid",
                "grades.first",
                "grades.second",
                "grades.third",
                "grades.fourth",
                "grades.avg",
                "subjects.descriptive_title",
                DB::raw("CONCAT(teachers.teacher_lastname,', ',teachers.teacher_firstname,' ',teachers.teacher_middlename) as fullname")
            )->join('students', 'grades.student_id', 'students.id')
                ->join('subjects', 'grades.subject_id', 'subjects.id')
                ->leftjoin('assigns', 'grades.subject_id', 'assigns.subject_id')
                ->leftjoin('teachers', 'assigns.teacher_id', 'teachers.id')
                ->where('grades.student_id', Auth::user()->id)
                ->where('grades.section_id', $section)
                // ->where('assigns.grade_level', $level)
                ->where('assigns.section_id', $section)
                ->get()
        );
    }

    public function levelList()
    {
        return response()->json(
            Enrollment::select('enrollments.grade_level', 'school_years.status', 'sections.section_name', 'enrollments.section_id')
                ->join('students', 'enrollments.student_id', 'students.id')
                ->join('sections', 'enrollments.section_id', 'sections.id')
                ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
                ->where('students.id', Auth::user()->id)
                ->groupBy('enrollments.grade_level', 'school_years.status', 'sections.section_name', 'enrollments.section_id')
                ->orderBy('school_years.status', 'desc')
                ->get()
        );
    }

    public function enrollment()
    {
        $dataArr = array();
        $ifexist = Enrollment::select('enrollments.enroll_status', 'enrollments.action_taken', 'section_name', 'enrollments.grade_level')
            ->join('students', 'enrollments.student_id', 'students.id')
            ->leftjoin('sections', 'enrollments.section_id', 'sections.id')
            ->join('school_years', 'enrollments.school_year_id', 'school_years.id')
            ->where('school_years.status', 1)
            ->where('students.id', Auth::user()->id)
            ->first();
        if ($ifexist) {
            $dataArr['status'] = $ifexist->enroll_status;
            $dataArr['action_taken'] = $ifexist->action_taken;
            $dataArr['section'] = $ifexist->section_name;
            $dataArr['grade_level'] = 'Grade ' . $ifexist->grade_level;
        } else {
            $dataArr['status'] = 'Ongoing';
            $dataArr['action_taken'] = 'None';
        }
        $eStatus = $this->enrollStatus();
        return view('student/enrollment', compact('eStatus', 'dataArr'));
    }

    public function checkSubjectBalance(Student $student)
    {
        return Grade::where('student_id', $student->id)->WhereNull('avg')->orWhere('avg', '')->get()->count();
    }

    public function selfEnroll(Request $request)
    {
        $countFail =  BackSubject::where('back_subjects.student_id', $request->id)->where('remarks', 'none')->get();
        $action_taken = $countFail->count() == 0 ? 'Promoted' : ($countFail->count() < 3 ? 'Partialy Promoted' : 'Retained');
        $studInfo = Enrollment::select('grade_level', 'curriculum')->where('student_id', $request->id)->latest()->first();

        if ($action_taken == 'Retained') { //if student retained in year level means this is backsubject will reset in grade level
            BackSubject::where('student_id', $request->id)->where('grade_level', $countFail[0]->grade_level)->delete();
            $subjects = Subject::where('grade_level', $countFail[0]->grade_level)->whereIn('subject_for', [$studInfo->curriculum, 'GENERAL'])->get();
            foreach ($subjects as $subject) {
                Grade::where('student_id',$request->id)
                ->where('subject_id',$subject->id)
                ->delete();
            }
        }

        Student::where('id',$request->id)->update(['last_school_attended'=>'PILI NATIONAL HIGH SCHOOL']);

        return Enrollment::create([
            'student_id' => $request->id,
            // 'section_id' => $request->section_id,
            'grade_level' => $countFail->count() >= 3 ? $countFail[0]->grade_level : ($studInfo->grade_level + 1),
            'school_year_id' => Helper::activeAY()->id,
            'date_of_enroll' => date("d/m/Y"),
            'action_taken' => $action_taken,
            'enroll_status' => 'Pending',
            'curriculum' => $studInfo->curriculum,
            'student_type' => ($studInfo->grade_level + 1) <= 10 ? 'JHS' : null,
            'state' => 'Old',
        ]);
    }

    public function viewRecord(Student $student)
    {
        $recordSeven = $this->gradeViewAll($student->id, 7);
        $recordEight = $this->gradeViewAll($student->id, 8);
        $recordNine = $this->gradeViewAll($student->id, 9);
        $recordTen = $this->gradeViewAll($student->id, 10);

        return view('administrator/masterlist/student/record', compact('student', 'recordSeven', 'recordEight', 'recordNine', 'recordTen'));
    }

    public function gradeViewAll($id, $gl)
    {
        return Grade::select(
            "first",
            'second',
            'third',
            'fourth',
            'sections.section_name',
            'subjects.descriptive_title',
            'subjects.grade_level',
            DB::raw("CONCAT(teachers.teacher_lastname,', ',teachers.teacher_firstname,' ',teachers.teacher_middlename) as fullname")
        )
            ->join("students", "grades.student_id", "students.id")
            ->join('subjects', 'grades.subject_id', 'subjects.id')
            ->join('sections', 'grades.section_id', 'sections.id')
            ->join('teachers', 'sections.teacher_id', 'teachers.id')
            ->where('students.id', $id)
            ->where('subjects.grade_level', $gl)
            ->get();
    }
    
    public function backsubject()
    {
        return view('student/backsubject');
    }

    public function storeProfileImage(Request $request){
        // $destinationPath = public_path('image/profile');
        // $request->file->move($destinationPath,$name);
        
        
        
        $this->deleteOldImage();
        $image = $request->file('file');
        // $input['imagename'] = time().'.'.$image->extension();
        $name = time().rand(1000,10000).rand(1000,10000).'.'.$request->file->getClientOriginalExtension();
        
        // $filePath = public_path('image/profile');
        
        // $img = Image::make($image->path());
        // $img->resize(110, 110, function ($const) {
        //     $const->aspectRatio();
        // })->save($filePath.'/'.$name);
        $filePath = public_path('image/profile');
        $image->move($filePath, $name);
       return Student::where('id',Auth::user()->id)->update(['profile_image'=>$name]);
    }


    protected function deleteOldImage()
    {
      if (auth()->user()->profile_image){
        return unlink(public_path('image/profile/'.auth()->user()->profile_image));
      }
     }

    public function reportBug()
    {
        return view("student/reportBug");
    }
}
