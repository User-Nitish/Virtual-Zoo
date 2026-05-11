<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch 3 most recent animals from the database for the home page
        $featuredAnimals = \App\Models\Animal::with('category')->latest()->take(3)->get();
        
        // Fetch categories with animal count for "Explore Categories" section
        $categories = \App\Models\Category::withCount('animals')->get();
        
        // Fetch quick stats for the homepage
        $stats = [
            'animals' => \App\Models\Animal::count(),
            'categories' => \App\Models\Category::count()
        ];

        return view('home', compact('featuredAnimals', 'categories', 'stats'));
    }
}
