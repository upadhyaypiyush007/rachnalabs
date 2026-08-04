<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use DataTables;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index');
    }

    public function data(Request $request)
    {
        $bookings = Booking::with('user')->latest()->get();

        $bookings->transform(function ($item) {
            $item->image_url = $item->user && $item->user->image ? Get_Image('user', $item->user->image) : asset('assets/imgs/1.png');
            return $item;
        });
        return DataTables::of($bookings)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->image_url . '" height="50" width="50" class="rounded-circle" />';
            })
            ->addColumn('user_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('booking_type', function ($row) {
                return ucfirst($row->booking_type);
            })
            ->addColumn('payment_status', function ($row) {
                return $row->payment_status == 1 ? 'Booked' : ($row->payment_status == 2 ? 'Cancelled' : 'Pending');
            })
            ->addColumn('payment_id', function ($row) {
                return ucfirst($row->payment_id);
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y');
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('admin.bookings.edit', $row->id) . '" class="btn"><img src="' . url("assets/imgs/edit.png") . '" /></a> ';
                $btn .= '<a href="' . route('admin.bookings.destroy', $row->id) . '" onclick="return confirm(\'Are you sure you want to delete this item\')" class="delete btn btn-sm"><img src="' . url("assets/imgs/trash.png") . '" /></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
