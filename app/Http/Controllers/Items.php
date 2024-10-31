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
}