<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use function Laravel\Prompts\alert;

class Loans extends Controller
{
    public function dashboard()
    {
        $data = Loan::all(); // Fetch all data from your model Loan
        $after_con = Image::all();
        return view('dashboard', ['data' => $data, 'after_con' => $after_con]); // Pass the data to the view
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
        $itemExists = Item::where('item_key', $validatedData['item-key'])->exists();

        if (!$itemExists) {
            // Redirect back with error if item_key does not exist
            return redirect()->back()->withErrors(['item-key' => 'The specified item key does not exist in the items list.'])->withInput();
        }

        // Create a new Loan instance with validated data
        Loan::create([
            'id_borrower' => $validatedData['borrower-id'],
            'borrower_name' => $validatedData['borrower-name'],
            'item_key' => $validatedData['item-key'],
            'due_date' => $validatedData['return-date'],
            'it_approver' => $validatedData['it-approver'],
            'description' => $validatedData['description'],
            'status' => 'Pending',
            // Any other fields as needed
        ]);

        // Return a success response
        return redirect()->route('dashboard')->with('success', 'Record submitted successfully!');
    }

    public function destroy($id) {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return response()->json(['success' => 'Record deleted successfully.']);
    }
    public function update(Request $request, $id) {
        // Validate incoming request data
        $validatedData = $request->validate([
            // Uncomment these if these fields are required for your update logic
            // 'borrower-id' => 'required|string|max:255',
            // 'item-key' => 'required|string|max:255',
            // 'due-date' => 'required|date_format:Y-m-d\TH:i', // Ensure this matches your datetime-local input
            // 'description' => 'nullable|string',
            'status' => 'required|string',
            'it-receiver' => 'required|string|max:255',
            'after-condition' => 'required|mimes:pdf,jpg,jpeg,png|max:100048', // Handle file uploads
        ]);

        try {
            // Find the loan record and update it
            $loan = Loan::findOrFail($id);
            
            // Uncomment and set these fields as required 
            // if needed for your application logic
            // $loan->id_borrower = $validatedData['borrower-id'];
            // $loan->item_key = $validatedData['item-key'];
            // $loan->due_date = $validatedData['due-date'];
            // $loan->description = $validatedData['description'];
            
            $loan->status = $validatedData['status'];
            $loan->it_receiver = $validatedData['it-receiver'];

            // Handle the file upload if it exists
            if ($request->hasFile('after-condition')) {
                // Create a unique folder structure
                $folderName = 'uploads/loan-after-condition/' . $loan->id;
                
                // Store the file and save the file path
                $request->file('after-condition');
                $file = $request->file('after-condition');
                $filePath = $file->store($folderName, 'public'); // Store the file using the specified folder

                // Create a new image record associated with the loan
                $image = new Image;
                $image->loan_id = $loan->id; // Link to loan
                $image->file_name = $file->getClientOriginalName(); // Store the original file name
                $image->file_path = $filePath; // Store path
                $image->save(); // Save the image record
            }
            $loan->save(); // Save the loan after updating
            return response()->json(['success' => 'Record updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not update the record.'], 500);
        }
    }
    public function edit($id)
    {
        // Find the loan record by ID
        $loan = Loan::findOrFail($id);

        // Return the loan data as JSON
        return response()->json($loan);
    }
}
