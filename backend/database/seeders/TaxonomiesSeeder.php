<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonomiesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $now = DB::raw("NOW()");

    // brands
    DB::table('taxonomies')->insert([
      'name' => 'Apple',
      'type' => 'brand',
      'created_at' => $now,
      'updated_at' => $now
    ]);
    DB::table('taxonomies')->insert([
      'name' => 'Samsung',
      'type' => 'brand',
      'created_at' => $now,
      'updated_at' => $now
    ]);
    DB::table('taxonomies')->insert([
      'name' => 'Huawei',
      'type' => 'brand',
      'created_at' => $now,
      'updated_at' => $now
    ]);
    DB::table('taxonomies')->insert([
      'name' => 'Xiaomi',
      'type' => 'brand',
      'created_at' => $now,
      'updated_at' => $now
    ]);
    DB::table('taxonomies')->insert([
      'name' => 'JBL',
      'type' => 'brand',
      'created_at' => $now,
      'updated_at' => $now
    ]);

    // types
    DB::table('taxonomies')->insert([
      'name' => 'wired',
      'type' => 'type',
      'created_at' => $now,
      'updated_at' => $now
    ]);
    DB::table('taxonomies')->insert([
      'name' => 'wireless',
      'type' => 'type',
      'created_at' => $now,
      'updated_at' => $now
    ]);

    // category
    DB::table('taxonomies')->insert([
      'name' => 'headphones',
      'type' => 'category',
      'created_at' => $now,
      'updated_at' => $now
    ]);

    // product_status
    foreach (config('constants.product.statuses') as $name) {
      DB::table('taxonomies')->insert([
        'name' => $name,
        'type' => 'product_status',
        'created_at' => $now,
        'updated_at' => $now
      ]);
    }

    // order_status
    foreach (config('constants.order.statuses') as $name) {
      DB::table('taxonomies')->insert([
        'name' => $name,
        'type' => 'order_status',
        'created_at' => $now,
        'updated_at' => $now
      ]);
    }
  }
}
