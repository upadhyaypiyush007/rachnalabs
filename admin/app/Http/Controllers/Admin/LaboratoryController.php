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
        $labs = Laboratory::with(['user', 'cast', 'package', 'LabTest'])->latest()->get();
        $labs->transform(function ($item) {
            $item->status_text = $item->status == 1 ? 'Active' : 'Inactive';
            return $item;
        });
        return DataTables::of($labs)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            })
            ->addColumn('cast_name', function ($row) {
                return $row->cast ? $row->cast->name : '';
            })
            ->addColumn('package_name', function ($row) {
                return $row->package ? $row->package->name : '';
            })
            ->addColumn('test_name', function ($row) {
                return $row->test ? $row->test->name : '';
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
        $users = Users::all();
        return view('admin.laboratories.create', compact('casts', 'packages', 'tests', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cast_id' => 'nullable|numeric|exists:cast,id',
            'package_id' => 'nullable|numeric|exists:package,id',
            'test_id' => 'nullable|numeric|exists:lab_tests,id',
            'user_id' => 'required|numeric|exists:user,id',
            'status' => 'required|in:0,1',
        ]);
        Laboratory::create($request->all());
        return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory created successfully.');
    }
    public function show($id)
    {
        $lab = Laboratory::with(['user', 'cast', 'package', 'test'])->findOrFail($id);
        return view('admin.laboratories.show', compact('lab'));
    }
    public function edit($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        $casts = Cast::all();
        $packages = Package::all();
        $tests = LabTest::all();
        $users = Users::all();
        return view('admin.laboratories.edit', compact('laboratory', 'casts', 'packages', 'tests', 'users'));
    }
    public function update(Request $request, $id)
    {
        $lab = Laboratory::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cast_id' => 'nullable|numeric|exists:cast,id',
            'package_id' => 'nullable|numeric|exists:package,id',
            'test_id' => 'nullable|numeric|exists:lab_tests,id',
            'user_id' => 'required|numeric|exists:user,id',
            'status' => 'required|in:0,1',
        ]);
        $lab->update([
            'name' => $request->name,
            'address' => $request->address,
            'cast_id' => $request->cast_id ?? null,
            'package_id' => $request->package_id ?? null,
            'test_id' => $request->test_id ?? null,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory updated successfully.');
    }
    public function destroy($id)
    {
        try {
            $lab = Laboratory::findOrFail($id);

            $booking = Booking::where('center_id', $lab->id)->first();
            if ($booking) {
                return redirect()->back()->with('error', 'This Laboratory is used in some bookings so you cannot delete it.');
            }

            $lab->delete();

            return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
