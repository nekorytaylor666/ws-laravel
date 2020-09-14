<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        $res = [];
        foreach ($orders as $order) {
            $items = $order->items;
            $items_res = [];
            foreach ($items as $item) {
                array_push($items_res,
                [
                    "id" => $item->id,
                    "product" => $item->product,
                    "color" => $item->color,
                    "symbol" => $item->symbol
                ]);
            }

            array_push($res,
            [
                "id"=>$order->id,
                "client"=>$order->client,
                "status" => $order->status,
                "items" => $items_res
            ]);
        }

        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return Order::create(["client_id" => $request->client_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
