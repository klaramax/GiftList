<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Person;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Show the form to create a new gift.
     */
    public function create()
    {
        // Retrieve all persons associated with the currently logged-in user
        $persons = Person::where('user_id', auth()->id())->orderBy('name')->get();

        // Pass the persons data to the view
        return view('create-gift', compact('persons'));
    }

    /**
     * Store a new gift in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'where_bought' => 'nullable|string|max:255',
            'person_id' => 'required|exists:persons,id',
        ]);

        // Create and save the new gift
        Gift::create([
        'name' => $request->name,
        'price' => $request->price,
        'url' => $request->url,
        'where_bought' => $request->where_bought,
        'person_id' => $request->person_id,
        'user_id' => auth()->id(),
    ]);

        // Redirect back to the dashboard or wherever appropriate
        return redirect()->route('dashboard');
    }

    /**
     * Show the form to edit an existing gift.
     */
    public function edit(Gift $gift)
    {
        return view('edit-gift', compact('gift'));
    }

    /**
     * Delete a gift from the database.
     */
    public function destroy(Gift $gift)
    {
        // Check if the logged-in user is the gift creator
        if ($gift->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this gift.');
        }

        // Delete the gift
        $gift->delete();

        // Redirect back to the dashboard or wherever appropriate
        return redirect()->route('dashboard');
    }
}
