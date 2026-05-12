<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Mammal' => 'Warm-blooded vertebrates characterized by hair or fur, and the production of milk by females for their young.',
            'Bird' => 'Feathered, winged, egg-laying vertebrates known for their ability to fly and unique nesting behaviors.',
            'Reptile' => 'Cold-blooded vertebrates including snakes, lizards, and turtles, typically having dry scaly skin.',
            'Amphibian' => 'Unique creatures that live both in water and on land, known for their moist skin and metamorphic life cycles.',
            'Fish' => 'Aquatic gill-bearing animals that lack limbs with digits, ranging from colorful coral dwellers to deep-sea giants.',
            'Insect' => 'Small, six-legged invertebrates with segmented bodies and exoskeletons, the most diverse group of animals on Earth.',
        ];

        foreach ($categories as $name => $description) {
            \App\Models\Category::updateOrCreate(
                ['name' => $name],
                ['description' => $description]
            );
        }
    }
}
