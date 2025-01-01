<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;


class PersonController {
    public function create() {
        return view('create-person'); // View for creating a new person
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $person = new Person();
        $person->name = $request->name;
        $person->user_id = auth()->id(); // Assign person to logged-in user
        $person->save();

        return redirect()->route('home');
    }

    public function edit(Person $person) {
        return view('edit-person', compact('person')); // View for editing a person
    }

    public function update(Request $request, Person $person) {

         $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $person->name = $validated['name'];
        $person->save();

        return redirect()->route('home');
    }

    public function destroy(Person $person) {
        $person->delete();

        return redirect()->route('home');
    }
}