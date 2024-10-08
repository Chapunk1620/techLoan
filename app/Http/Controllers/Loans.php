<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Loans extends Controller
{
    public function dashboard()
    {
        $data = Loan::all(); // Fetch all data from your model
        return view('dashboard', ['data' => $data]); // Pass the data to the view
    }
    public function json(Request $request)
    {
        // Get base query
    $query = Loan::query();

    // Apply month filter if selected
    if ($request->has('month') && !empty($request->month)) {
        $query->whereMonth('date', $request->month); // Assuming 'date' is the field you want to filter by
    }

    // Apply status filter if selected
    if ($request->has('status') && !empty($request->status)) {
        $query->where('status', $request->status);
    }

    // Return data to DataTables with server-side processing
    return DataTables::of($query)
        ->make(true);
    }
}
