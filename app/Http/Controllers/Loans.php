<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Item as ModelsItem;
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
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'borrower-id' => 'required|string',
            'borrower-name' => 'required|string|max:255',
            'item-key' => 'required|string|max:255',
            'return-date' => 'required|date',
            'it-approver' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Check if the item_key exists in the items table using the Item model
        $itemExists = ModelsItem::where('item_key', $validatedData['item-key'])->exists();

        if (!$itemExists) {
            // Redirect back with error if item_key does not exist
            return redirect()->back()->withErrors(['item-key' => 'The specified item key does not exist in the items table.'])->withInput();
        }

        // Create a new Loan instance with validated data
        Loan::create([
            'id_borrower' => $validatedData['borrower-id'],
            'borrower_name' => $validatedData['borrower-name'],
            'item_key' => $validatedData['item-key'],
            'due_date' => $validatedData['return-date'],
            'it_approver' => $validatedData['it-approver'],
            'description' => $validatedData['description'],
            // Any other fields as needed
        ]);

        // Return a success response
        return redirect()->route('dashboard')->with('success', 'Record submitted successfully!');
    }
}
