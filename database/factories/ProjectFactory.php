<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');

        return [
            'title'       => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'deadline_at' => now()->addDays(rand(1, 30))->format('Y-m-d'),
            'status'      => fake()->randomElement(ProjectStatus::cases())->value,
            'user_id'     => $users->random(),
            'client_id'   => $clients->random(),
        ];
    }
}
