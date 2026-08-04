<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Laboratory;
use App\Models\Cast;
use App\Models\Package;
use App\Models\LabTest;
use App\Models\Users;
use DataTables;
class LaboratoryController extends Controller
{
    public function index()
    {
        return view('admin.laboratories.index');
    }
    public function data(Request $request)
    {
        // Load many-to-many relationships
        $labs = Laboratory::with(['casts', 'packages', 'tests'])->latest()->get();
        $labs->transform(function ($item) {
            $item->status_text = $item->status == 1 ? 'Active' : 'Inactive';
            return $item;
        });
        return DataTables::of($labs)
            ->addIndexColumn()
            ->addColumn('cast_name', function ($row) {
                // join multiple doctors (casts) names
                return $row->casts->pluck('name')->join(', ');
            })
            ->addColumn('package_name', function ($row) {
                // join multiple packages names
                return $row->packages->pluck('name')->join(', ');
            })
            ->addColumn('test_name', function ($row) {
                // join multiple tests names
                return $row->tests->pluck('name')->join(', ');
            })
            ->addColumn('status', function ($row) {
                return $row->status_text;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y');
            })
            ->addColumn('action', function ($row) {
                $editBtn = '<a href="' . route('admin.laboratories.edit', $row->id) . '" class="btn">
                <img src="' . url("assets/imgs/edit.png") . '" />
            </a>';
                $deleteBtn = '<form action="' . route('admin.laboratories.destroy', $row->id) . '" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Are you sure you want to delete this lab?\')">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-sm" style="border:none; background:none; padding:0;">
                    <img src="' . url("assets/imgs/trash.png") . '" />
                </button>
              </form>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function create()
    {
        $casts = Cast::all();
        $packages = Package::all();
        $tests = LabTest::all();
        // $users = Users::all();
        return view('admin.laboratories.create', compact('casts', 'packages', 'tests'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'cast_id' => 'nullable|array',
                'cast_id.*' => 'nullable|numeric|exists:cast,id',
                'package_id' => 'nullable|array',
                'package_id.*' => 'nullable|numeric|exists:package,id',
                'test_id' => 'nullable|array',
                'test_id.*' => 'nullable|numeric|exists:lab_tests,id',
                'status' => 'required|in:0,1',
            ]);
            $laboratory = Laboratory::create([
                'name' => $request->name,
                'address' => $request->address,
                'status' => $request->status,
            ]);
            // Attach related models
            if ($request->cast_id) {
                $laboratory->casts()->sync($request->cast_id);
            }
            if ($request->package_id) {
                $laboratory->packages()->sync($request->package_id);
            }
            if ($request->test_id) {
                $laboratory->tests()->sync($request->test_id);
            }
            return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }
    public function show($id)
    {
        $lab = Laboratory::with(['cast', 'package', 'test'])->findOrFail($id);
        return view('admin.laboratories.show', compact('lab'));
    }
    public function edit($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        $casts = Cast::all();
        $packages = Package::all();
        $tests = LabTest::all();
        $laboratory->cast_ids = $laboratory->casts->pluck('id')->toArray();
        $laboratory->package_ids = $laboratory->packages->pluck('id')->toArray();
        $laboratory->test_ids = $laboratory->tests->pluck('id')->toArray();
        return view('admin.laboratories.edit', compact('laboratory', 'casts', 'packages', 'tests'));
    }
    public function update(Request $request, $id)
    {
        try {
            $laboratory = Laboratory::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'cast_id' => 'nullable|array',
                'cast_id.*' => 'nullable|numeric|exists:cast,id',
                'package_id' => 'nullable|array',
                'package_id.*' => 'nullable|numeric|exists:package,id',
                'test_id' => 'nullable|array',
                'test_id.*' => 'nullable|numeric|exists:lab_tests,id',
                'status' => 'required|in:0,1',
            ]);
            $laboratory->update([
                'name' => $request->name,
                'address' => $request->address,
                'status' => $request->status,
            ]);
            // Sync related models
            $laboratory->casts()->sync($request->cast_id ?? []);
            $laboratory->packages()->sync($request->package_id ?? []);
            $laboratory->tests()->sync($request->test_id ?? []);
            return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $lab = Laboratory::findOrFail($id);
            $booking = Booking::where('center_id', $lab->id)->first();
            if ($booking) {
                return redirect()->back()->with('error', 'This Laboratory is used in some bookings so you cannot delete it.');
            }
            $lab->casts()->detach();
            $lab->packages()->detach();
            $lab->tests()->detach();
            // Laboratory delete
            $lab->delete();
            return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
