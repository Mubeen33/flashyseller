<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Order extends Model implements Feedable
{
    public function toFeedItem(): FeedItem
    {
       return FeedItem::create([
            'id' => $this->id,
            'title' => "Hello title",
            'summary' => "Hello summary",
            'updated' => $this->created_at,
            'link' => route('vendor.orderView.get', $this->id),
            'author' => 'Vendor',
        ]);
    }

    public static function gerVendorOrders()
	{
	   return Order::all();
	}
}
