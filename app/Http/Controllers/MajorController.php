<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Major;
use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::latest()->paginate(5);
        return Inertia::render('Major/Index', ['majors' => $majors]);
    }

    public function create()
    {
        return Inertia::render('Major/Create');
    }

    public function store(MajorStoreRequest $request)
    {
        Major::create([
            'name' => $request->name,
        ]);

        return redirect('/major')->with('success', 'Major Created Successfully!');
    }

    public function edit($id)
    {
        $major = Major::where('id', $id)->first();
        return Inertia::render('Major/Edit', ['major' => $major]);
    }

    public function update(MajorUpdateRequest $request, $id)
    {
        $major = Major::where('id', $id)->first();
        $major->update([
            'name' => $request->name,
        ]);

        return redirect('/major')->with('success', 'Major Updated Successfully!');
    }

    public function delete($id)
    {
        $major = Major::where('id', $id)->first();
        $major->delete();
        return redirect()->back()->with('success', 'Major Deleted Successfully!');
    }
}
