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

        return view('admin.dashboard', compact('totalAnimals', 'totalCategories', 'totalImages', 'recentAnimals'));
    }
}
