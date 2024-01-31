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
        // DB::table('orders')->insert([

        $new_order_1->user_id = $faker->randomElement($user_ids);
        $new_order_1->order_date = now();
        $new_order_1->client_address = 'Via Roma 123, Roma';
        $new_order_1->total_price = 45.99;
        $new_order_1->details = '';
        $new_order_1->client_phone = '3420157848';
        $new_order_1->client_email = 'mario.rossi27@example.com';
        $new_order_1->client_name = 'Mario Rossi';
        $new_order_1->created_at = now();
        $new_order_1->updated_at = now();
        $new_order_1->save();
        $new_order_1->items()->attach($faker->randomElements($item_ids, null));
        // ]);
        // Ordine 2
        $new_order_2->user_id = $faker->randomElement($user_ids);
        $new_order_2->order_date = now();
        $new_order_2->client_address = 'Via Roma 223, Roma';
        $new_order_2->total_price = 42.49;
        $new_order_2->details = '';
        $new_order_2->client_phone = '3420257848';
        $new_order_2->client_email = 'gianluck@example.com';
        $new_order_2->client_name = 'Gianluca Grignani';
        $new_order_2->created_at = now();
        $new_order_2->updated_at = now();
        $new_order_2->save();
        $new_order_2->items()->attach($faker->randomElements($item_ids, null));

        // DB::table(orders')->insert([
        //     'user_id' => $faker->randomElement($user_ids);
        //     'order_date' => now(),
        //     'client_address' => 'Corso Italia 456, Roma',
        //     'total_price' => 32.50,
        //     'details' => 'Campanello numero 4',
        //     'client_phone' => '3425896548',
        //     'client_email' => 'annabianchi1996@example.com',
        //     'client_name' => 'Anna Bianchi',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

    }
}
