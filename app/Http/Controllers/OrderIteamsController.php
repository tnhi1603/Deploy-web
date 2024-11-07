<?php

namespace App\Http\Controllers;

use App\Models\Order_iteams;
use App\Http\Requests\StoreOrder_iteamsRequest;
use App\Http\Requests\UpdateOrder_iteamsRequest;
use App\Models\Carts;
use App\Models\Order_items;
use App\Models\Voucher;
use App\Models\Watch;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class OrderIteamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store($request)
    {
        //
        // $validated = $request->validate([
        //     //
        //     'quantity' => 'required|integer|min:1',
        //     'order_id' => 'required',
        //     'product_id' => 'required'
        // ]);
        try {
            $order_id = $request['order_id'];
            $price = 0;
            $watches_id = $request['watches_id'];
            $quantity = $request['quantity'];
            foreach ($watches_id as $i => $watch_id) {
                $watch = Watch::find($watch_id);
                $price += $watch->price * (1 - $watch->discount);

                //Kiểm tra còn hàng trong kho hong, ko còn thì trả về -1 rồi báo lỗi
                if ($quantity[$i] > $watch->storage)
                {
                    return -1;
                }
                else {
                    $watch->storage -= $quantity[$i];
                    $watch->save();
                }
                Order_items::create(['order_id' => $order_id, 'watch_id' => $watch_id, 'quantity' => $quantity[$i], 'price' => $watch->price * (1 - $watch->discount)]);
                CartsController::minusAfterBuy($watch_id, $quantity, auth()->user()->id);
            }

            return $price;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        
    }

    /**
     * Display the specified resource.
     */
    // public static function show()
    // {
    //     //
    //     dd(auth()->user()->id);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy($order_id)
    {
        //
        Order_items::where('order_id', $order_id)->get()->each->delete();
    }
}
