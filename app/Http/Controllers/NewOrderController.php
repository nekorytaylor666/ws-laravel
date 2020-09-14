<?php

namespace App\Http\Controllers;

use App\Client;
use App\Color;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Symbol;
use Illuminate\Http\Request;

class NewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $data = $request -> all();
            $client = $data["client"] ;
            $items = $data["items"] ;
            $newUser = Client::create([
                'first_name' => $client["first_name"],
                'last_name' => $client["last_name"],
                'email' => $client["email"]
            ]);

            $newOrder = Order::create(['client_id' => $newUser -> id]);
            foreach ($items as $item) {
                $productType = $item["product"];
                $productColor = $item["color"];
                $productSymbol = $item["symbol"];
                $product = Product::where('type', $productType)->first();
                $color = Color::where('name', $productColor)->first();
                $symbol = Symbol::where('id',$productSymbol["id"])->first();
                $orderItem = OrderItem::create([
                    'product_id' => $product -> id,
                    'color_id' => $color -> id,
                    'symbol_id' => $symbol -> id,
                    'order_id' => $newOrder -> id
                ]);

            }
            return $newOrder -> items;
        } catch (\Throwable $th) {
            return $th;
        }

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
