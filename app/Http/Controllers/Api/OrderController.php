<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\OrderResource;
use App\Http\Requests\Api\Order\StoreRequest;

class OrderController extends Controller
{
    public function store(StoreRequest $request): OrderResource
    {
        $params = $request->validated();
        $password = Hash::make('tester123');
        $user = User::firstOrCreate(
            ['email' => $params['email']],
            [
                'first_name' => $params['first_name'],
                'patronymic' => $params['patronymic'],
                'last_name' => $params['last_name'],
                'address' => $params['address'],
                'password' => $password,
                'gender' => $params['gender']
            ]
        );
        $order = Order::create([
            'totalPrice' => $params['totalPrice'],
            'address' => $params['address'],
            'user_id' => $user->id,
            'products' => json_encode($params['products']),
        ]);
        return new OrderResource($order);
    }
}
