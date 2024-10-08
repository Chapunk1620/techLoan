<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;

class Loans extends Controller
{
    public function dashboard()
    {
        $data = Loan::all(); // Fetch all data from your model
        return view('dashboard', ['data' => $data]); // Pass the data to the view
    }
    public function json(Request $request)
{
    // Get total number of records
    $totalData = Loan::count();
    $totalFiltered = $totalData; // Set filtered count to total at first
    
    // If there is a search parameter
    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value'); 
        
        // Search your database for matching records
        $loans = Loan::where('borrower_name', 'like', "%{$search}%")
            ->orWhere('item_key', 'like', "%{$search}%")
            ->orWhere('status', 'like', "%{$search}%")
            ->orWhere('it_approver', 'like', "%{$search}%")
            ->orWhere('it_receiver', 'like', "%{$search}%")
            ->offset($request->input('start'))
            ->limit($request->input('length'))
            ->get();
        
        // Update the filtered data count after searching
        $totalFiltered = Loan::where('borrower_name', 'like', "%{$search}%")
            ->orWhere('item_key', 'like', "%{$search}%")
            ->orWhere('status', 'like', "%{$search}%")
            ->orWhere('it_approver', 'like', "%{$search}%")
            ->orWhere('it_receiver', 'like', "%{$search}%")
            ->count();
    } else {
        // No search parameter, so return the paginated results
        $loans = Loan::offset($request->input('start'))
            ->limit($request->input('length'))
            ->get();
    }
    
    // Format the data for DataTables
    $json_data = [
        "draw" => intval($request->input('draw')),  // Client-side draw number for security
        "recordsTotal" => intval($totalData),       // Total records before filtering
        "recordsFiltered" => intval($totalFiltered),// Total records after filtering
        "data" => $loans                           // The actual data returned
    ];
    
    // Return the JSON response
    return response()->json($json_data);
}
}
