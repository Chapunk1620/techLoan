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
        $validatedData = $request->validate([
            // 'edit-item-item-key' => 'required|string|max:255',
            'edit-item-item-type' => 'required|string|max:255',
            'edit-item-status' => 'required|string|max:255',
            'edit-item-arrive' => 'required|date',
            'edit-item-image' => 'nullable|mimes:pdf,jpg,jpeg,png|max:100048',
        ]);

        try {
            // Find the loan record and update it
            $item = Item::findOrFail($id);            
            $item->status = $validatedData['edit-item-status'];
            // $item->item_key = $validatedData['edit-item-item-key'];
            $item->item_type = $validatedData['edit-item-item-type'];
            $item->date_arrival = $validatedData['edit-item-arrive'];

            // Handle the file upload if it exists
            if ($request->hasFile('edit-item-image')) {
                // Create a unique folder structure
                $folderName = 'uploads/item-image/' . $item->item_key;
                
                // Store the file and save the file path
                $request->file('edit-item-image');
                $file = $request->file('edit-item-image');
                $filePath = $file->store($folderName, 'public'); // Store the file using the specified folder
                $item->attachment = $filePath; // Store path
            }
            $item->save(); // Save the loan after updating
            return response()->json(['success' => 'Record updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not update the record.'], 500);
        }
    }
}