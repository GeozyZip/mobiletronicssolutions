<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show all bookings
public function index()
{
    $bookings = BookingModel::where('userId', Auth::id())->get();

    return view('booking.index', compact('bookings'));
}


    // Show create booking form
    public function create()
    {
        return view('booking.create');
    }

    // Store new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bookingName' => 'required|in:Repair,Maintenance,Consultation',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'phoneNumber' => 'required|string|max:20',
            'message' => 'nullable|string|max:255',
        ]);

        // Add the authenticated user's ID
        $validated['userId'] = Auth::id();
        $validated['status'] = 'pending'; // Default status

        try {
            BookingModel::create($validated);
            return redirect()->back()->with('success', 'Booking created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create booking: ' . $e->getMessage());
        }
    }

    // Update booking status and message
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
            'message' => 'nullable|string|max:255',
        ]);

        $booking = BookingModel::findOrFail($id);
        $booking->status = $request->status;
        $booking->message = $request->message;
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // For public view (if any)
    public function public()
    {
        return view('booking2');
    }

    public function submitBooking(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'bookingName' => 'required|string|max:255',
        'phoneNumber' => 'required|string|max:20',
        'date' => 'required|date',
        'time' => 'required',
        'message' => 'nullable|string',
    ]);

    // Add the authenticated user's ID
    $validated['userId'] = Auth::id();
    
    // You might also want to set a default status
    $validated['status'] = 'pending';

    // Store in database
    BookingModel::create($validated);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Booking submitted successfully!');
}

    public function history()
    {
        $bookings = BookingModel::where('userId', Auth::id())->get();
        return view('history', compact('bookings'));
    }

    // Add this method to your BookingController class

public function search(Request $request)
{
    $search = $request->input('search');
    
    $bookings = BookingModel::where('bookingName', 'LIKE', "%{$search}%")
        ->orWhere('phoneNumber', 'LIKE', "%{$search}%")
        ->orWhere('status', 'LIKE', "%{$search}%")
        ->orWhere('message', 'LIKE', "%{$search}%")
        ->orderBy('bookingId', 'desc')
        ->get();
        
    return view('booking.index', compact('bookings'));
}

    
    

}