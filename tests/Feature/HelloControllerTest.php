<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * 
     */
    private function beforeTest(){
    }

    /**
     * 
     */
    private function afterTest(){        
    }

    /**
     * 1. リクエスト成功.
     * @test
     * @return void
     */
    public function index_default()
    {
        // Memcached をFacade化 or spyでモックか.
        // ・・・

        $response = $this->get('/hello');

        // verify
        $response->dump();
        $response->assertStatus(200)
                 ->assertSee('TEST');
    }

}
