<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Client;
use App\Models\Project;

class ClientTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_client(): void
    {
        $client = Client::factory()->create();
        $this->assertDatabaseCount('clients',$client->id);
    }

    public function test_update_client(): void
    {
        $client = Client::factory()->create();
        $client->name = 'test';
        $client->email = "test_".$client->email;
        $client->save();

        $this->assertEquals($client->getOriginal(), Client::where('id', $client->id)->first()->getOriginal());
       
    }

    public function test_delete_client(): void
    {
        $client = Client::factory()->create();
        $client->save();

        //check if the new Client was created
        $this->assertEquals($client->getOriginal(), Client::where('id', $client->id)->first()->getOriginal());
        
        //check if Client was deleted
        $client->delete();
        $this->assertEquals(null, Client::where('id', $client->id)->first());
    }

    public function test_client_project(): void
    {
        $project1 = Project::factory()->create();
        $project2 = Project::factory()->create();

        $client = Client::factory()->create();

        $client->projects()->saveMany([$project1, $project2]);

        $this->assertEquals(2, $client->projects()->count());
    }
}
