<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class OrderSubmissionTest extends TestCase
{
    use RefreshDatabase;

    protected array $validPayload = [
        'name' => 'Иван',
        'contact' => '@telegram',
        'technology' => 'resin',
        'painting' => 'advanced',
    ];

    public function test_an_artist_can_submit_an_order(): void
    {
        $response = $this->post(route('orders.store'), $this->validPayload);

        $response->assertRedirect(route('order.create'));
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('orders', [
            'name' => 'Иван',
            'contact' => '@telegram',
            'technology' => 'resin',
            'painting' => 'advanced',
            'status' => 'new',
        ]);
    }

    public function test_a_pending_order_requires_name_and_contact(): void
    {
        $response = $this->from('/order')->post(route('orders.store'), []);

        $response->assertSessionHasErrors(['name', 'contact', 'technology', 'painting']);
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_a_pending_order_validates_the_uploaded_file(): void
    {
        $response = $this->post(route('orders.store'), [
            ...$this->validPayload,
            'file' => UploadedFile::fake()->create('model.txt', 10),
        ]);

        $response->assertSessionHasErrors('file');
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_a_pending_order_can_attach_a_model_file(): void
    {
        $file = UploadedFile::fake()->create('miniature.stl', 100);

        $response = $this->post(route('orders.store'), [
            ...$this->validPayload,
            'assembly' => '1',
            'scale' => '28 мм',
            'comment' => 'Нужен NMM по металу.',
            'file' => $file,
        ]);

        $response->assertRedirect(route('order.create'));

        $order = Order::query()->first();

        $this->assertNotNull($order->file_path);
        $this->assertTrue($order->assembly);
        $this->assertSame('new', $order->status->value);
        $this->assertSame('Нужен NMM по металу.', $order->comment);
    }
}
