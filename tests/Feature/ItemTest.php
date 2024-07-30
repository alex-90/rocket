<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Throwable;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_laracat(): void
    {
        $response = $this->get('/');

        $response->assertSeeText('Laracasts');
    }

    /** @test */
    public function test_item_stored(): void
    {
        $this->withoutExceptionHandling();

        $data = [
            'title' => 'New Item',
            'price' => 100,
            'amount' => 10,
        ];

        $response = $this->post('/items', $data);

        $response->assertOk();

        $this->assertDatabaseCount('items', 1);

        $item = Item::first();

        $this->assertEquals('New Item', $item->title);
    }

}
