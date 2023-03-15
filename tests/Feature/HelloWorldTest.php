<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HelloWorldTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_contains_hello_world(): void
    {
        $response = $this->get('/');

        $response->assertSee('Hello World !');

    }
}
