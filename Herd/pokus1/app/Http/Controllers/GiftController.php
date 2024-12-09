<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Show the form to create a new gift.
     */
    public function create()
    {
        return view('create-gift'); // Show the form to create a new gift
    }

    /**
     * Store a new gift in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255', // Ensure the gift has a name
            'price' => 'nullable|numeric',       // Price is optional and must be numeric
            'url' => 'nullable|url',             // URL is optional and must be a valid URL
            'where_bought' => 'nullable|string|max:255', // Where the gift was bought is optional
        ]);

        // Create and save the new gift
        $gift = new Gift();
        $gift->name = $request->name;
        $gift->price = $request->price;
        $gift->url = $request->url;
        $gift->where_bought = $request->where_bought;
        $gift->user_id = auth()->id(); // Assign the gift to the logged-in user
        $gift->save();

        // Redirect back to the dashboard or wherever appropriate
        return redirect()->route('dashboard');
    }

    /**
     * Show the form to edit an existing gift.
     */
    public function edit(Gift $gift)
    {
        // Check if the logged-in user is the owner of the gift
        if ($gift->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this gift.');
        }

        return view('edit-gift', compact('gift')); // Show the form to edit the gift
    }

    /**
     * Update the details of an existing gift.
     */
    public function update(Request $request, Gift $gift)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'where_bought' => 'nullable|string|max:255',
        ]);

        // Check if the logged-in user is the owner of the gift
        if ($gift->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to update this gift.');
        }

        // Update the gift's details
        $gift->name = $request->name;
        $gift->price = $request->price;
        $gift->url = $request->url;
        $gift->where_bought = $request->where_bought;
        $gift->save();

        // Redirect back to the dashboard or wherever appropriate
        return redirect()->route('dashboard');
    }

    /**
     * Delete a gift from the database.
     */
    public function destroy(Gift $gift)
    {
        // Check if the logged-in user is the owner of the gift
        if ($gift->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this gift.');
        }

        // Delete the gift
        $gift->delete();

        // Redirect back to the dashboard or wherever appropriate
        return redirect()->route('dashboard');
    }
}
