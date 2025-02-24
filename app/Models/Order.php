<?php

namespace App\Models;

use App\Mail\OrderSuccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    public static function saveOrder($data)
    {
        $order = new Order();
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = getCurr()->code;
        $order->save();

        self::saveOrderProduct($order->id);
        
        return $order->id;
    }

    public static function saveOrderProduct($order_id)
    {
        $items = Cart::getCartItems();

        foreach ($items as $key => $item) {
            $productId = explode('-', $key)[0];
    
            OrderProduct::create([
                'order_id'  => $order_id,
                'product_id' => $productId,
                'qty'       => $item['quantity'],
                'title'     => $item['title'],
                'price'     => $item['price'],
            ]);
        }
    }

    public static function mailOrder($order_id, $user_email)
    {
        $details = [
            'name' => $user_email,
            'order_id' => $order_id
        ];
        
        Mail::to($user_email)->send(new OrderSuccess($details));
    }
}
