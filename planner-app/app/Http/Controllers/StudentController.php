<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', [
            'groups' => \App\Models\Group::where('user_id', Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        Student::create($data);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $source = $student->sources->pluck('id');
        $sources = Source::where('user_id', Auth::id())
            ->whereNotIn('id', $source ?? [])->get();
        return view('student.show', [
            'student' => $student,
            'sources' => $student->sources,
            'meetings' => $student->meetings,
            'isnotsources' => $sources,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStudentRequest $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
    public function addSourse()
    {
        $data = request()->validate(
            [
                'id' => 'integer',
                'sources' => 'required|array'
            ]
        );
        if (!is_null($data['sources'])) {
            $student = Student::find($data['id']);
            if (!is_null($student)) {
                $student->sources()->attach($data['sources']);
            }
        }
        return redirect()->route('students.show', $data['id']);
    }
    public function delSourse()
    {
        $data = request()->validate(
            [
                'id' => 'integer',
                'source' => 'integer'
            ]
        );
        if (!is_null($data['source'])) {
            $student = Student::find($data['id']);
            if (!is_null($student)) {
                $student->sources()->detach($data['source']);
            }
        }
        return redirect()->route('students.show', $data['id']);
    }
}
