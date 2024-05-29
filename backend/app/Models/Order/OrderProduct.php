<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderProduct extends Model
{
  use HasFactory;

  protected $table = 'order_products';

  protected $fillable = [
    'order_id',
    'product_id',
    'variation_id',
    'quantity',
    'discount',
    'original_price',
    'price'
  ];

  public function scopeForOrder(Builder $query, $orderId)
  {
    $query->select([
      'order_id',
      'product_id',
      'variation_id',
      'discount',
      'original_price',
      'price',
    ])->where('order_id', $orderId);
  }

  public function scopeProductsList(Builder $query, $userId)
  {
    $query->select([
      'order_products.order_id',
      'order_products.product_id',
      'order_products.variation_id',
      'order_products.quantity',
      'order_products.discount',
      'order_products.original_price',
      'order_products.price',
      'orders.user_id',
      'orders.status',
      'orders.created_at',
      'orders.user_id',
      'products.id as product_id',
      'products.name as product_name',
      'products.brand as product_brand',
      'products.type as product_type',
      'product_variation_values.value as variation',
      'product_variation_values.image_path as image_path',
    ])
      ->where('orders.user_id', $userId)
      ->leftJoin('orders', 'orders.id', '=', 'order_products.order_id')
      ->leftJoin('product_variation_values', 'product_variation_values.id', '=', 'order_products.variation_id')
      ->leftJoin('products', 'products.id', '=', 'product_variation_values.product_id');
  }
}
