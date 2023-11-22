<?php

namespace Tests\Unit;

use App\Casts\Status;
use Tests\TestCase;
use App\Models\project;
use App\Models\User;
use App\Models\Client;
use App\Models\Task;


class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_project(): void
    {
        $project = project::factory()->create();
        $this->assertDatabaseCount('projects', $project->id);
    }

    public function test_update_project(): void
    {
        $project = project::factory()->create();
        $project->title = 'test_'.$project->title;
        $project->description = "test_".$project->description;
        $project->deadline = now();
        $project->status = Status::STATUS_LIST[0];
        $project->save();

        $this->assertEquals($project->toArray(), project::where('id', $project->id)->first()->toArray());
       
    }

    public function test_project_user(): void
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $project->user()->associate($user);
        $project->save();
        $this->assertTrue($project->user()->first() == Project::where('id', $project->id)->first()->user()->first());
    }

    public function test_project_client(): void
    {
        $project = Project::factory()->create();
        $client = Client::factory()->create();
        $project->client()->associate($client);
        $project->save();
        $this->assertEquals($project->client()->first(), Project::where('id', $project->id)->first()->client()->first());
    }
    public function test_project_tasks(): void
    {
        $project = Project::factory()->create();
        $tasks = Task::factory()->count(5)->create();
        $project->tasks()->saveMany($tasks);
        $project->save();
        $this->assertTrue(5 == Project::where('id', $project->id)->first()->tasks()->count());
    }
}
