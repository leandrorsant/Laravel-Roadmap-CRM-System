<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Project;
use Database\Factories\UserFactory;
use Tests\TestCase;
use App\Models\User;
class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_user(): void
    {
        $user = User::factory()->create();
        $this->assertTrue(User::where("id", $user->id)->exists());
    }

    public function test_update_user(): void
    {
        $user = User::factory()->create();
        $user->name = 'test';
        $user->email_verified_at = now();
        $user->is_admin = true;
        $user->save();

        $this->assertEquals($user->getOriginal(), User::where('id', $user->id)->first()->getOriginal());
       
    }

    public function test_delete_user(): void
    {
        $user = User::factory()->create();
        $user->save();

        //check if the new user was created
        $this->assertEquals($user->getOriginal(), User::where('id', $user->id)->first()->getOriginal());
        
        //check if user was deleted
        $user->delete();
        $this->assertEquals(null, User::where('id', $user->id)->first());
    }

    public function test_user_clients(): void
    {
        $user = User::factory()->create();

        $projects = Project::factory()->count(5)->create()->each(function($project){
            $project->user()->associate(User::factory()->create());
        });

        foreach ($projects as $p){
            $p->user()->associate($user);
        }

    }
}
