<?php

namespace Tests\Feature;

use App\Models\PortfolioItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_each_public_page_returns_a_successful_response(): void
    {
        foreach (['services', 'portfolio', 'terms', 'contacts'] as $page) {
            $this->get(route($page))->assertStatus(200);
        }
    }

    public function test_portfolio_page_displays_items_from_database(): void
    {
        PortfolioItem::create([
            'title' => 'Тестовая работа',
            'category' => 'wargames',
            'description' => 'Описание тестовой работы',
        ]);

        $this->get(route('portfolio'))
            ->assertOk()
            ->assertSee('Тестовая работа');
    }
}
