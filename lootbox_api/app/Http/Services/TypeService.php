<?php

namespace App\Http\Services;

use App\Models\Type;
use App\Models\Sport;
use App\Models\Learning;
use App\Models\Project;
use Illuminate\Support\Collection;

class TypeService extends Service
{
    private array $typeDefinitions = [
        Sport::class => [
            'name' => 'Sport',
            'description' => 'Physical activities and sports',
            'icon' => '🏃',
            'fields' => [
                'min' => 'Minimum duration in minutes',
                'max' => 'Maximum duration in minutes'
            ]
        ],
        Learning::class => [
            'name' => 'Learning',
            'description' => 'Educational activities and courses',
            'icon' => '📚',
            'fields' => [
                'time_min' => 'Minimum time (HH:MM)',
                'time_max' => 'Maximum time (HH:MM)'
            ]
        ],
        Project::class => [
            'name' => 'Project',
            'description' => 'Personal or professional projects',
            'icon' => '💼',
            'fields' => [
                'time_min' => 'Minimum time (HH:MM)',
                'time_max' => 'Maximum time (HH:MM)',
                'progress' => 'Current progress (0-100)'
            ]
        ]
    ];

    public function all(): Collection
    {
        return collect($this->typeDefinitions)->map(function ($definition, $class) {
            return [
                'name' => $definition['name'],
                'class' => $class,
                'description' => $definition['description'],
                'icon' => $definition['icon'],
                'fields' => $definition['fields']
            ];
        });
    }

    public function getTypeDefinition(string $class): ?array
    {
        return $this->typeDefinitions[$class] ?? null;
    }
} 