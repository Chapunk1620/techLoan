<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class Items extends Controller
{
    public function allitems()
    {
        $data = Item::all(); // Fetch all data from your model Loan
        return view('dashboard', ['data' => $data]); // Pass the data to the view
    }
}
