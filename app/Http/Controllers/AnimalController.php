<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource for Admin (Table View).
     */
    public function index()
    {
        // Admin view with pagination
        $animals = Animal::with('category')->latest()->paginate(10);
        return view('animals.index', compact('animals'));
    }

    /**
     * Display a public grid of animals with search & filtering.
     */
    public function directory(Request $request)
    {
        $query = Animal::with('category')->latest();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Paginate public directory (e.g. 9 per page for a 3-column grid)
        $animals = $query->paginate(9)->withQueryString();
        $categories = Category::all(); 
        
        return view('directory', compact('animals', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all categories for the dropdown in the form
        $categories = Category::all();
        return view('animals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'habitat' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'lifespan' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create the animal record in the database
        Animal::create($validatedData);

        // Redirect back to the listing with a success message
        return redirect()->route('animals.index')->with('success', 'Animal added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        // Fetch up to 3 related animals from the same category, excluding the current animal
        $relatedAnimals = Animal::where('category_id', $animal->category_id)
                                ->where('id', '!=', $animal->id)
                                ->take(3)
                                ->get();
                                
        return view('animals.show', compact('animal', 'relatedAnimals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $categories = Category::all();
        return view('animals.edit', compact('animal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'habitat' => 'required|string|max:255',
            'food_type' => 'required|string|max:255',
            'lifespan' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image replacement if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image from storage
            if ($animal->image) {
                Storage::disk('public')->delete($animal->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('animals', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the database record
        $animal->update($validatedData);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        // Delete the image file from storage if it exists
        if ($animal->image) {
            Storage::disk('public')->delete($animal->image);
        }

        // Delete the record from database
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }
}
