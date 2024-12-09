<?php

// PersonController
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

    return redirect()->route('dashboard');
}

public function edit(Person $person) {
    return view('edit-person', compact('person')); // View for editing a person
}

public function update(Request $request, Person $person) {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $person->name = $request->name;
    $person->save();

    return redirect()->route('dashboard');
}

public function destroy(Person $person) {
    $person->delete();

    return redirect()->route('dashboard');
}
