<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $carlo_items = Item::where('user_id', '=', 1)->pluck('id');
        for ($i = 0; $i < 150; $i++) {
            $new_order = new Order();
            $new_order->user_id = 1;
            $new_order->order_date = $faker->dateTimeBetween('-5 year', 'now');
            $new_order->client_address = $faker->streetAddress();
            $new_order->total_price = $faker->randomFloat(2,0,900);
            $new_order->details = $faker->sentences(3,true);
            $new_order->client_phone = $faker->phoneNumber();
            $new_order->client_email = $faker->email();
            $new_order->client_name = $faker->name();
            $new_order->created_at = now();
            $new_order->updated_at = now();
            $new_order->save();
            $new_order->items()->attach($faker->randomElements($carlo_items, null), [
                'quantity' => $faker->randomDigitNotNull(),
                'partial_price' => $faker->randomFloat(2, 1, 50)
            ]);
        }
    }
}
