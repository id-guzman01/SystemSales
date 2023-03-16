<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_id' => rand(1,2),
            'documento' => rand(1000000000,9999999999),
            'nombres' => fake()->name(),
            'primer_apellido' => fake()->firstName(),
            'segundo_apellido' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'estado_id' => '1',
            'password' => Hash::make('123456789'),
            'gender_id' => rand(1,2),
            'fecha_nacimiento' => fake()->dateTimeBetween('-18 years')->format('Y-m-d'),
            'url' => '/storage/profile/user-profile.png',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
