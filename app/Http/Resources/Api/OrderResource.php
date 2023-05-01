<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'totalPrice' => $this->totalPrice,
            'products' => json_encode($this->products),
            'user_id' => $this->user_id,
            'payment_status' => $this->payment_status
        ];
    }
}
