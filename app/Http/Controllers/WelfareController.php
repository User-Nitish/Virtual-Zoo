<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class WelfareController extends Controller
{
    /**
     * Display the welfare management center.
     */
    public function index()
    {
        $animals = Animal::with('category')->get();
        return view('admin.welfare.index', compact('animals'));
    }

    /**
     * Update animal welfare status.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'health_status' => 'required|string',
            'dietary_needs' => 'nullable|string',
            'last_checkup' => 'nullable|date',
            'next_checkup' => 'nullable|date',
        ]);

        $animal->update($request->only(['health_status', 'dietary_needs', 'last_checkup', 'next_checkup']));

        return redirect()->back()->with('success', 'Welfare records updated for ' . $animal->name);
    }
}
