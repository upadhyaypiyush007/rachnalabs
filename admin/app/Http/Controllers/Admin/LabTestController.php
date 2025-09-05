<?php

namespace App\Http\Controllers\Admin;

use App\Models\LabTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabTestController extends Controller
{
    public function index()
    {
        $tests = LabTest::paginate(10);
        return view('admin.labtest.index', compact('tests'));
    }

    public function create()
    {
        return view('admin.labtest.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        LabTest::create($request->all());
        return redirect()->route('labtests.list')->with('success', 'Lab test created successfully');
    }

    public function show(LabTest $labTest)
    {
        return view('admin.labtest.show', compact('labTest'));
    }

    public function edit($id)
    {

        $test = LabTest::findOrFail($id);
        return view('admin.labtest.edit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        $labTest = LabTest::findOrFail($id);

        $labTest->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Lab test updated successfully',
            'data' => $labTest
        ]);
    }


    public function destroy($id)
    {
        $labTest = LabTest::findOrFail($id);
        $labTest->delete();

        return redirect()->route('labtests.list')->with('success', 'Lab test deleted successfully');
    }

}
