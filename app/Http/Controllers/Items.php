<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class Items extends Controller
{
    public function allitems() {
        $data = Item::all(); // Fetch all data from your model Loan
        return view('dashboard', ['data' => $data]); // Pass the data to the view
    }
    public function store(Request $request) {
        $request->validate([
            'item-no' => 'required',
            'item-type' => 'required',
            'date-arrived' => 'required|date',
            'image-item' => 'mimes:pdf,jpg,jpeg,png|max:100048'
        ]);

        $item = new Item();
        $item->item_key = $request->input('item-no');
        $item->item_type = $request->input('item-type');
        $item->date_arrival = $request->input('date-arrived');
        $item->status = 'Available';

        if ($request->hasFile('image-item')) {
            // Store the file in the public storage
            $path = $request->file('image-item')->storeAs(
                'uploads/item-image/' . $item->item_key,
                $request->file('image-item')->getClientOriginalName(),
                'public' // Specify the 'public' disk here
            );
            $item->attachment = $path;
        }

        $item->save();

        return redirect()->route('dashboard')->with('success', 'Item added successfully.');
    }
    public function destroy($id) {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(['success' => 'Record deleted successfully.']);
    }
    public function edit($id) {
        // Find the loan record by ID
        $item = Item::findOrFail($id);

        // Fetch the latest image path if the $id matches the loan_field of Image table
        $image = Item::where('id', $id)->orderBy('created_at', 'desc')->first();

        // Use the path as stored in the database
        $imagePath = $image ? $item->attachment : null;

        // Add the image path to the loan data
        $item->latestImage = $imagePath;
        // Return the loan data with image path as JSON
        return response()->json([
            'item' => $item,
            'image' => $imagePath
        ]);
    }
    public function update(Request $request, $id) {
        // Validate incoming request data
        $validatedData = $request->validate([
            'status' => 'required|string',
            'it-receiver' => 'required|string|max:255',
            'after-condition' => 'mimes:pdf,jpg,jpeg,png|max:100048', // Handle file uploads
        ]);

        try {
            // Find the loan record and update it
            $loan = Item::findOrFail($id);            
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
                $image = new Item;
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
}