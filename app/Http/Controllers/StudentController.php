<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Major;
use App\Models\Student;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('major')->latest()->paginate(5);
        return Inertia::render('Student/Index', ['students' => $students]);
    }

    public function create()
    {
        $majors = Major::all();
        return Inertia::render('Student/Create', ['majors' => $majors]);
    }

    public function store(StudentStoreRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'major_id' => $request->major_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect('/student')->with('success', 'Student Created Successfully!');
    }

    public function edit($id)
    {
        $majors = Major::all();
        $student = Student::findOrFail($id);
        return Inertia::render('Student/Edit', ['majors' => $majors, 'student' => $student]);
    }

    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'major_id' => $request->major_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect('/student')->with('success', 'Student Updated Successfully!');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully!');
    }
}
