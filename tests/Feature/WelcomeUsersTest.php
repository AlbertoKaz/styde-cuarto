<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    public function it_welcomes_users_with_nickname(): void
    {
        $this->get('/saludo/Alberto/Kazuya')
            ->assertStatus(200)
            ->assertSee("Bienvenido Alberto, tu apodo es Kazuya");
    }

    /** @test */
    public function it_welcomes_users_without_nickname(): void
    {
        $this->get('/saludo/Alberto/')
            ->assertStatus(200)
            ->assertSee("Bienvenido Alberto, no tienes apodo");
    }
}
