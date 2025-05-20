<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sport',
                'icon' => '🏃',
                'description' => 'Activités sportives et physiques'
            ],
            [
                'name' => 'Apprentissage',
                'icon' => '📚',
                'description' => 'Activités d\'apprentissage et de développement personnel'
            ],
            [
                'name' => 'Projet',
                'icon' => '💼',
                'description' => 'Projets personnels et professionnels'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 