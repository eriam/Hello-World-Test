<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Route;

class HelloWorldTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_that_model_returns_bob(): void
    {
        $this->assertEquals('Bob', (new User)->getName());
    }
}
