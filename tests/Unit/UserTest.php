<?php

namespace Tests\Unit;

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
        $this->assertDatabaseCount('users',$user->id);
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
}
