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
        $user_ids = User::pluck('id');
        $item_ids = Item::pluck('id');
        $new_order_1 = new Order();
        $new_order_2 = new Order();

        // Ordine 1

        // $new_order_1->user_id = $faker->randomElement($user_ids);
        // $new_order_1->order_date = now();
        // $new_order_1->client_address = 'Via Roma 123, Roma';
        // $new_order_1->total_price = 45.99;
        // $new_order_1->details = '';
        // $new_order_1->client_phone = '3420157848';
        // $new_order_1->client_email = 'mario.rossi27@example.com';
        // $new_order_1->client_name = 'Mario Rossi';
        // $new_order_1->created_at = now();
        // $new_order_1->updated_at = now();
        // $new_order_1->save();
        // $new_order_1->items()->attach($faker->randomElements($item_ids, null));
        // ]);
        // Ordine 2
        // $new_order_2->user_id = $faker->randomElement($user_ids);
        // $new_order_2->order_date = now();
        // $new_order_2->client_address = 'Via Roma 223, Roma';
        // $new_order_2->total_price = 42.49;
        // $new_order_2->details = '';
        // $new_order_2->client_phone = '3420257848';
        // $new_order_2->client_email = 'gianluck@example.com';
        // $new_order_2->client_name = 'Gianluca Grignani';
        // $new_order_2->created_at = now();
        // $new_order_2->updated_at = now();
        // $new_order_2->save();
        // $new_order_2->items()->attach($faker->randomElements($item_ids, null));

        $carlo_items = Item::where('user_id', '=', 1)->pluck('id');
        for ($i = 0; $i < 15; $i++) {
            $new_order = new Order();
            $new_order->user_id = 1;
            $new_order->order_date = now();
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
                'quantity' => $faker->randomDigitNotNull()
            ]);
        }
    }
}
