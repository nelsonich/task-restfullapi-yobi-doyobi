<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get()
    {
        $orders = Order::all();

        return response()->json([
            'orders' => $orders,
            'success' => 'ok',
        ]);
    }

    public function getById($id)
    {
        $order = Order::find($id);

        return response()->json([
            'order' => $order,
            'success' => 'ok',
        ]);
    }

    public function create(Request $request)
    {
        $phone = $request->post('phone');
        $full_name = $request->post('full_name');
        $cost = $request->post('cost');
        $dropoff_location = $request->post('dropoff_location');

        $order = new Order();
        $order->phone = $phone;
        $order->full_name = $full_name;
        $order->cost = $cost;
        $order->dropoff_location = $dropoff_location;
        $order->save();

        return response()->json([
            'success' => 'ok',
        ], 201);
    }

    public function edit(Request $request, $id)
    {
        $phone = $request->post('phone');
        $full_name = $request->post('full_name');
        $cost = $request->post('cost');
        $dropoff_location = $request->post('dropoff_location');

        $order = Order::whereId($id)->first();

        $order->phone = $phone;
        $order->full_name = $full_name;
        $order->cost = $cost;
        $order->dropoff_location = $dropoff_location;
        $order->save();

        return response()->json([
            'success' => 'ok',
            'order' => $order,
        ]);
    }

    public function remove($id)
    {
        Order::destroy($id);

        return response()->json([
            'success' => 'ok',
        ]);
    }
}
