<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with statistics.
     */
    public function dashboard()
    {
        // Calculate statistics
        $totalAnimals = Animal::count();
        $totalCategories = Category::count();
        
        // Let's assume every animal has an image for the image count stat, 
        // or we can count animals where image is not null
        $totalImages = Animal::whereNotNull('image')->count();

        // Fetch recently added animals for the dashboard table
        $recentAnimals = Animal::with('category')->latest()->take(5)->get();

        // Data for Charts: Animal counts per category
        $categoriesData = Category::withCount('animals')->get();
        $chartLabels = $categoriesData->pluck('name');
        $chartValues = $categoriesData->pluck('animals_count');

        return view('admin.dashboard', compact(
            'totalAnimals', 
            'totalCategories', 
            'totalImages', 
            'recentAnimals',
            'chartLabels',
            'chartValues'
        ));
    }
}
