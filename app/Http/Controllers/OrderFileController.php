<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrderFileController extends Controller
{
    public function download(Order $order): StreamedResponse
    {
        abort_unless(filled($order->file_path), 404);
        abort_unless(Storage::disk('local')->exists($order->file_path), 404);

        return Storage::disk('local')->download($order->file_path, basename($order->file_path));
    }
}
