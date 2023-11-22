<?php

namespace Tests\Unit;

use App\Casts\Status;
use Tests\TestCase;
use App\Models\project;
use App\Models\User;
use App\Models\Client;
use App\Models\Task;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_task(): void
    {
        $task = project::factory()->create();
        $this->assertDatabaseCount('tasks', $task->id);
    }

    public function test_update_task(): void
    {
        $task = project::factory()->create();
        $task->title = 'test_'.$task->title;
        $task->description = "test_".$task->description;
        $task->deadline = now();
        $task->status = Status::STATUS_LIST[0];
        $task->save();

        $this->assertEquals($task->toArray(), project::where('id', $task->id)->first()->toArray());
       
    }

    public function test_task_user(): void
    {
        $task = Project::factory()->create();
        $user = User::factory()->create();
        $task->user()->associate($user);
        $task->save();
        $this->assertTrue($task->user()->first() == Project::where('id', $task->id)->first()->user()->first());
    }

    public function test_task_client(): void
    {
        $task = Project::factory()->create();
        $client = Client::factory()->create();
        $task->client()->associate($client);
        $task->save();
        $this->assertEquals($task->client()->first(), Project::where('id', $task->id)->first()->client()->first());
    }
    public function test_task_tasks(): void
    {
        $task = Project::factory()->create();
        $tasks = Task::factory()->count(5)->create();
        $task->tasks()->saveMany($tasks);
        $task->save();
        $this->assertTrue(5 == Project::where('id', $task->id)->first()->tasks()->count());
    }
}
