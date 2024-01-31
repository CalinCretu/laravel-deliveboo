<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $user_ids = User::pluck('id');

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Pizza Margherita',
            'slug' => 'pizza-margherita',
            'price' => 10.99,
            'item_img' => 'path/to/image1.jpg',
            'description' => 'Delicious Margherita Pizza',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Diavola',
            'slug' => 'diavola',
            'price' => 12.50,
            'item_img' => 'path/to/image2.jpg',
            'description' => 'Spicy Pizza with Salamino',
            'is_vegan' => false,
            'is_gluten_free' => false,
            'is_spicy' => true,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Napoli',
            'slug' => 'napoli',
            'price' => 9.00,
            'item_img' => 'path/to/image3.jpg',
            'description' => 'Anchovies Pizza',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Cotto e Mozzarella',
            'slug' => 'cotto-e-mozzarella',
            'price' => 8.50,
            'item_img' => 'path/to/image4.jpg',
            'description' => 'Gluten Free Pizza with Ham and Mozzarella',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Vegans Choice',
            'slug' => 'vegans-choice',
            'price' => 29.50,
            'item_img' => 'path/to/image5.jpg',
            'description' => 'Best Vegan Pizza in town with Vegetables',
            'is_vegan' => true,
            'is_gluten_free' => false,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Cacio e Pepe',
            'slug' => 'cacio-e-pepe',
            'price' => 12.00,
            'item_img' => 'path/to/image6.jpg',
            'description' => 'Cacio Cheese and Pepper Pasta',
            'is_vegan' => false,
            'is_gluten_free' => false,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Carbonara',
            'slug' => 'carbonara',
            'price' => 11.50,
            'item_img' => 'path/to/image7.jpg',
            'description' => 'Egg and Bacon and Pepper Pasta (roman recepie)',
            'is_vegan' => false,
            'is_gluten_free' => false,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Strangozzi with Spicy Vegetables',
            'slug' => 'strangozzi-con-verdure-piccanti',
            'price' => 15.00,
            'item_img' => 'path/to/image8.jpg',
            'description' => 'Vegan Pasta with Spicy Vegetables',
            'is_vegan' => true,
            'is_gluten_free' => false,
            'is_spicy' => true,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Ravioli filled with local Burrata',
            'slug' => 'ravioli-filled-with-local-burrata',
            'price' => 16.00,
            'item_img' => 'path/to/image9.jpg',
            'description' => 'Handmade Ravioli filled with local Burrata',
            'is_vegan' => false,
            'is_gluten_free' => false,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Gluten Free Amatriciana',
            'slug' => 'gluten-free-amatriciana',
            'price' => 10.00,
            'item_img' => 'path/to/image10.jpg',
            'description' => 'Classic Amatriciana Pasta, but Gluten Free!',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Grilled Lamb Chops',
            'slug' => 'grilled-lamb-chops',
            'price' => 16.00,
            'item_img' => 'path/to/image11.jpg',
            'description' => 'Grilled Lamb Chops',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Beef Filet with Truffles',
            'slug' => 'beef-filet-with-truffles',
            'price' => 28.00,
            'item_img' => 'path/to/image12.jpg',
            'description' => 'Buttery Beef Fillet with Black Truffle',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Pork Filet with Rocket Salad and Gorgonzola',
            'slug' => 'pork-filet-with-rocket-salad-and-gorgonzola',
            'price' => 18.00,
            'item_img' => 'path/to/image13.jpg',
            'description' => 'Local Pork Filet with Gorgonzola Cheese',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Roasted Seabass',
            'slug' => 'roasted-seabass',
            'price' => 18.00,
            'item_img' => 'path/to/image14.jpg',
            'description' => 'No bones Roasted Seabass',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Salmon Filet with Talegio Cheese',
            'slug' => 'salmon-filet-with-talegio-cheese',
            'price' => 24.00,
            'item_img' => 'path/to/image15.jpg',
            'description' => 'Oven Cooked Salmon Filet with Talegio Cheese',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Mixed Roast Meat',
            'slug' => 'mixed-roast-meat',
            'price' => 20.00,
            'item_img' => 'path/to/image16.jpg',
            'description' => 'Pork Sausages, Steak and Filet',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Roasted Chicken with Almonds',
            'slug' => 'roasted-chicken-with-almonds',
            'price' => 16.00,
            'item_img' => 'path/to/image17.jpg',
            'description' => 'Classic Roasted Chicken with Almonds',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Boar Ragù with Polenta',
            'slug' => 'boar-ragù-with-polenta',
            'price' => 15.50,
            'item_img' => 'path/to/image18.jpg',
            'description' => 'Local Boar Ragù with Polenta',
            'is_vegan' => false,
            'is_gluten_free' => false,
            'is_spicy' => false,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Chicken with Curry',
            'slug' => 'chicken-with-curry',
            'price' => 15.00,
            'item_img' => 'path/to/image19.jpg',
            'description' => 'Chicken with Curry Sauce',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => true,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('items')->insert([
            'user_id' => $faker->randomElement($user_ids),
            'name' => 'Milanese Style Ossibuchi',
            'slug' => 'milanese-style-ossibuchi',
            'price' => 12.00,
            'item_img' => 'path/to/image20.jpg',
            'description' => 'Classic Milanese Ossibuchi',
            'is_vegan' => false,
            'is_gluten_free' => true,
            'is_spicy' => true,
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
