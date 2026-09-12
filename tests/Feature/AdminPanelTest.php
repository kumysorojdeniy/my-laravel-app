<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_authenticated_user_can_open_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin')->assertOk();
    }

    public function test_authenticated_user_can_download_order_file(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('orders/miniature.stl', 'solid model');

        $order = Order::create([
            'name' => 'Иван',
            'contact' => '@telegram',
            'technology' => 'resin',
            'painting' => 'none',
            'file_path' => 'orders/miniature.stl',
        ]);

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('orders.file.download', $order))
            ->assertDownload('miniature.stl');
    }
}
