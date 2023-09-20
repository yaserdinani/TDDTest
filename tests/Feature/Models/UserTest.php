<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $data = User::factory()->make()->toArray();
        $data['password'] = 12345;
        User::create($data);
        $this->assertDatabaseHas('users',$data);
    }

    public function testUserRelationshipWithPost(){
        $count = rand(1,10);

        $user = User::factory()
                ->hasPosts($count)
                ->create();
        $this->assertCount($count,$user->posts);

    }
}
