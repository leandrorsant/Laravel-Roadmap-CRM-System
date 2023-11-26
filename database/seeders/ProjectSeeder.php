<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->count(300)->create()->each(function ($project){
            $project->user()->associate(User::InRandomOrder()->first());
            $project->client()->associate(Client::InRandomOrder()->first());
            $project->save();
        });
    }
}
