<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * 1. A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * 2.ルーティング外リクエスト
     * @test
     * @return void
     */
    public function noRoute()
    {
        $response = $this->get('/xxx');
        // verify
        $response->assertStatus(404);
    }
}
