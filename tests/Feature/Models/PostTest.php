<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $data = Post::factory()->make()->toArray();

        Post::create($data);

        $this->assertDatabaseHas('posts',$data);
    }

    public function testPostRelationshipWithUser(){
        $post = Post::factory()->for(User::factory())->create();
        $this->assertTrue(isset($post->user->id));
        $this->assertTrue($post->user instanceof User);
    }
}
