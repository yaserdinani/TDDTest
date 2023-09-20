<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testInsertData(): void
    {
        $data = Tag::factory()->make()->toArray();

        Tag::create($data);

        $this->assertDatabaseHas('tags',$data);
    }
}
