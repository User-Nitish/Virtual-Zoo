<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Category;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $mammal = Category::where('name', 'Mammal')->first();
        $bird = Category::where('name', 'Bird')->first();
        $reptile = Category::where('name', 'Reptile')->first();
        $amphibian = Category::where('name', 'Amphibian')->first();
        $fish = Category::where('name', 'Fish')->first();
        $insect = Category::where('name', 'Insect')->first();

        $animals = [
            // Mammals
            [
                'name' => 'African Elephant',
                'category_id' => $mammal->id,
                'habitat' => 'Savannah / Grasslands',
                'food_type' => 'Herbivore',
                'lifespan' => '60-70 Years',
                'description' => 'The largest land animal on Earth, known for its intelligence, complex social structures, and long ivory tusks.',
                'image' => 'placeholders/elephant.png',
                'health_status' => 'Excellent',
                'dietary_needs' => '150kg of vegetation and 100 liters of water daily.',
                'last_checkup' => '2026-04-15',
                'next_checkup' => '2026-10-15',
            ],
            [
                'name' => 'Bengal Tiger',
                'category_id' => $mammal->id,
                'habitat' => 'Tropical Rainforests',
                'food_type' => 'Carnivore',
                'lifespan' => '15-20 Years',
                'description' => 'A powerful apex predator with a distinctive orange coat and black stripes, native to the Indian subcontinent.',
                'image' => 'placeholders/tiger.png',
                'health_status' => 'Stable',
                'dietary_needs' => '8-10kg of fresh meat every 2 days.',
                'last_checkup' => '2026-05-01',
                'next_checkup' => '2026-08-01',
            ],
            [
                'name' => 'Grizzly Bear',
                'category_id' => $mammal->id,
                'habitat' => 'North American Forests',
                'food_type' => 'Omnivore',
                'lifespan' => '25 Years',
                'description' => 'A massive subspecies of the brown bear, recognized by the hump on its shoulders and its formidable strength.',
                'image' => 'placeholders/bear.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Mixed diet of berries, salmon, and seasonal nuts.',
                'last_checkup' => '2026-03-20',
                'next_checkup' => '2026-09-20',
            ],
            [
                'name' => 'Giant Panda',
                'category_id' => $mammal->id,
                'habitat' => 'Mountainous Forests',
                'food_type' => 'Herbivore',
                'lifespan' => '20 Years',
                'description' => 'A beloved symbol of wildlife conservation, this bear species spends most of its day eating bamboo.',
                'image' => 'placeholders/panda.png',
                'health_status' => 'Needs Attention',
                'dietary_needs' => '12-38kg of fresh bamboo shoots and leaves daily.',
                'last_checkup' => '2026-05-10',
                'next_checkup' => '2026-05-24',
            ],
            [
                'name' => 'African Lion',
                'category_id' => $mammal->id,
                'habitat' => 'Savannah',
                'food_type' => 'Carnivore',
                'lifespan' => '10-14 Years',
                'description' => 'The "King of the Jungle," known for its majestic mane and powerful social groups called prides.',
                'image' => 'placeholders/lion.png',
                'health_status' => 'Excellent',
                'dietary_needs' => '5-7kg of meat daily with supplements.',
                'last_checkup' => '2026-04-10',
                'next_checkup' => '2026-10-10',
            ],

            // Birds
            [
                'name' => 'Scarlet Macaw',
                'category_id' => $bird->id,
                'habitat' => 'Central/South America',
                'food_type' => 'Herbivore (Seeds/Fruits)',
                'lifespan' => '50 Years',
                'description' => 'A large, vibrant parrot with bright red, yellow, and blue plumage, famous for its loud squawks and intelligence.',
                'image' => 'placeholders/macaw.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Mixed seeds, nuts, and tropical fruits.',
                'last_checkup' => '2026-02-15',
                'next_checkup' => '2026-08-15',
            ],
            [
                'name' => 'Emperor Penguin',
                'category_id' => $bird->id,
                'habitat' => 'Antarctica',
                'food_type' => 'Carnivore (Fish)',
                'lifespan' => '20 Years',
                'description' => 'The tallest and heaviest of all living penguin species, known for surviving the harsh Antarctic winters.',
                'image' => 'placeholders/penguin.png',
                'health_status' => 'Stable',
                'dietary_needs' => '2-3kg of krill and small fish daily.',
                'last_checkup' => '2026-01-20',
                'next_checkup' => '2026-07-20',
            ],

            // Reptiles
            [
                'name' => 'Komodo Dragon',
                'category_id' => $reptile->id,
                'habitat' => 'Indonesian Islands',
                'food_type' => 'Carnivore',
                'lifespan' => '30 Years',
                'description' => 'The largest lizard species on Earth, possessing a venomous bite and an incredibly keen sense of smell.',
                'image' => 'placeholders/komodo.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Large feeding of meat once a week.',
                'last_checkup' => '2026-03-05',
                'next_checkup' => '2026-09-05',
            ],
            [
                'name' => 'Green Sea Turtle',
                'category_id' => $reptile->id,
                'habitat' => 'Tropical Oceans',
                'food_type' => 'Herbivore',
                'lifespan' => '80 Years',
                'description' => 'Graceful marine reptiles that migrate long distances between feeding grounds and nesting beaches.',
                'image' => 'placeholders/turtle.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Seagrass and algae with calcium supplements.',
                'last_checkup' => '2026-04-20',
                'next_checkup' => '2026-10-20',
            ],

            // Amphibians
            [
                'name' => 'Red-Eyed Tree Frog',
                'category_id' => $amphibian->id,
                'habitat' => 'Rainforest Canopy',
                'food_type' => 'Insects',
                'lifespan' => '5 Years',
                'description' => 'A small, vibrant frog with bulging red eyes, known for its ability to blend into the green leaves of the jungle.',
                'image' => 'placeholders/frog.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Small crickets and fruit flies daily.',
                'last_checkup' => '2026-05-05',
                'next_checkup' => '2026-06-05',
            ],
            [
                'name' => 'Pink Axolotl',
                'category_id' => $amphibian->id,
                'habitat' => 'Freshwater Lakes',
                'food_type' => 'Carnivore',
                'lifespan' => '10-15 Years',
                'description' => 'An aquatic salamander that remains in its larval form throughout its entire life, capable of regenerating lost limbs.',
                'image' => 'placeholders/axolotl.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Bloodworms and brine shrimp twice a day.',
                'last_checkup' => '2026-05-11',
                'next_checkup' => '2026-06-11',
            ],

            // Fish
            [
                'name' => 'Great White Shark',
                'category_id' => $fish->id,
                'habitat' => 'Open Ocean',
                'food_type' => 'Carnivore',
                'lifespan' => '70 Years',
                'description' => 'The world\'s largest known predatory fish, an efficient hunter with hundreds of serrated teeth.',
                'image' => 'placeholders/shark.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'High-protein diet of seal-grade meat and tuna.',
                'last_checkup' => '2026-02-01',
                'next_checkup' => '2026-08-01',
            ],
            [
                'name' => 'Ocellaris Clownfish',
                'category_id' => $fish->id,
                'habitat' => 'Coral Reefs',
                'food_type' => 'Omnivore',
                'lifespan' => '6-10 Years',
                'description' => 'A small, bright orange fish that lives in a symbiotic relationship with stinging sea anemones.',
                'image' => 'placeholders/clownfish.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Zooplankton and algae flakes.',
                'last_checkup' => '2026-05-01',
                'next_checkup' => '2026-06-01',
            ],

            // Insects
            [
                'name' => 'Monarch Butterfly',
                'category_id' => $insect->id,
                'habitat' => 'North America',
                'food_type' => 'Herbivore (Nectar)',
                'lifespan' => '6-8 Months',
                'description' => 'Famous for its incredible long-distance migration and striking orange and black wing patterns.',
                'image' => 'placeholders/butterfly.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'High-quality nectar and mineral water.',
                'last_checkup' => '2026-05-11',
                'next_checkup' => '2026-05-25',
            ],
            [
                'name' => 'Praying Mantis',
                'category_id' => $insect->id,
                'habitat' => 'Gardens / Forests',
                'food_type' => 'Carnivore',
                'lifespan' => '1 Year',
                'description' => 'A formidable insect predator known for its triangular head and its "praying" front legs used to ambush prey.',
                'image' => 'placeholders/mantis.png',
                'health_status' => 'Excellent',
                'dietary_needs' => 'Live insects (crickets/moths) twice a week.',
                'last_checkup' => '2026-04-20',
                'next_checkup' => '2026-05-20',
            ],
        ];

        foreach ($animals as $animalData) {
            Animal::updateOrCreate(['name' => $animalData['name']], $animalData);
        }
    }
}
