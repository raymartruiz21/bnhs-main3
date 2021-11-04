<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectSHSController extends Controller
{
    // public function store(Request $request)
    // {
    //     return Subject::updateorcreate(['shs_id' => $request->id], [
    //         'shs_strand_id' => $request->strand_id,
    //         'shs_grade_level' => $request->grade_level,
    //         'shs_subject_code' => $request->subject_code ,
    //         'shs_descriptive_title' => $request->descriptive_title,
    //         'shs_indicate_type' => $request->indicate_type,
    //         'shs_prerequisite' => $request->prerequisite,
    //         'shs_term' => $request->term,
    //     ]);
    // }
    public function store(Request $request)
    {
        return Subject::updateorcreate(['id' => $request->shs_id], [
            'strand_id' => $request->shs_strand_id ?? null,
            'grade_level' => $request->shs_grade_level ?? null,
            'subject_code' => $request->shs_subject_code,
            'descriptive_title' => $request->shs_descriptive_title,
            'subject_for' => $request->shs_subject_for,
            'indicate_type' => $request->shs_indicate_type,
            'prerequisite' => $request->shs_prerequisite ?? null,
            'term' => $request->shs_term,
        ]);
    }

    public function list($strand,$grade,$term)
    {
        return response()->json([
            'data' => Subject::select('subjects.id', 'strands.strand', 'indicate_type', 'subject_code', 'descriptive_title','prerequisite')
                ->join('strands', 'subjects.strand_id', 'strands.id')
                ->where('strands.id',$strand)
                ->where('subjects.grade_level',$grade)
                ->where('subjects.term',$term)
                ->whereNull('subject_for')
                ->get()
        ]);
    }

    public function destroy(Subject $subject)
    {
        return $subject->delete();
    }

    public function edit(Subject $subject)
    {
        return response()->json($subject);
    }
}
