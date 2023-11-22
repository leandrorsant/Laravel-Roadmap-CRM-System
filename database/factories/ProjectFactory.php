<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Casts\Status;
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
        return [
            "title" => $this->faker->sentence,
            "description" => $this->faker->realText(500),
            "deadline"=> $this->faker->dateTime,
            "status" => Status::STATUS_LIST[random_int(0, sizeof(Status::STATUS_LIST))]
        ];
    }
}
