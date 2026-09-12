<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create(): View
    {
        return view('pages.order');
    }

    public function store(OrderStoreRequest $request): RedirectResponse
    {
        $order = new Order($request->validated());
        $order->file_path = $request->hasFile('file')
            ? $request->file('file')->store('orders', 'local')
            : null;
        $order->save();

        return redirect()
            ->route('order.create')
            ->with('status', 'Заявка успешно отправлена. Мы свяжемся с вами по указанным контактам.');
    }
}
