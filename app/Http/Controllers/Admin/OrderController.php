<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(6);

        return view('admin/orders/orders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/orders/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        //$categories = Category::lists('name', 'id');
        $order = new Order();

        $order->shipping_data_country = $request->shipping_data_country;
        $order->shipping_data_city = $request->shipping_data_city;
        $order->shipping_data_address = $request->shipping_data_address;
        $order->total_price = $request->total_price;

        $order->save();

        $orders = Order::paginate(6);
        return view('admin/orders/orders', ['orders' => $orders]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin/orders/showOrder', ['orders' => Order::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin/orders/edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->shipping_data_country= $request['shipping_data_country'];
        $order->shipping_data_city= $request['shipping_data_city'];
        $order->shipping_data_address= $request['shipping_data_address'];
        $order->total_price= $request['total_price'];

        $order->save();

        $orders = Order::paginate(6);

        return view('admin/orders/orders', ['orders' => $orders]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
