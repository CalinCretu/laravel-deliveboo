<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $type_ids = Type::pluck('id');
        $new_user = new User();
        $new_user_2 = new User();
        $new_user_3 = new User();
        $new_user_4 = new User();
        $new_user_5 = new User();

        $new_user->business_name = 'Carlos Restaurant';
        $new_user->slug = 'carlos-restaurant';
        $new_user->email = 'carlo.business@gmail.com';
        $new_user->password = Hash::make('carlosrestaurant');
        $new_user->address = 'Piazza del Popolo; Roma';
        $new_user->vat_id = 'IT00000000489';
        $new_user->restaurant_img = 'path/to/rest_image.jpg';
        $new_user->created_at = now();
        $new_user->updated_at = now();
        $new_user->save();
        $new_user->types()->attach($faker->randomElements($type_ids, null));

        $new_user_2->business_name = 'Da Gianni';
        $new_user_2->slug = 'da-gianni';
        $new_user_2->email = 'giagianni@gmail.com';
        $new_user_2->password = Hash::make('tobi1975');
        $new_user_2->address = 'Piazza di Spagna, Roma';
        $new_user_2->vat_id = 'IT00000000459';
        $new_user_2->restaurant_img = 'path/to/rest_image2.jpg';
        $new_user_2->created_at = now();
        $new_user_2->updated_at = now();
        $new_user_2->save();
        $new_user_2->types()->attach($faker->randomElements($type_ids, null));

        $new_user_3->business_name = 'La Milanese';
        $new_user_3->slug = 'la-milanese';
        $new_user_3->email = 'milano21@gmail.com';
        $new_user_3->password = Hash::make('milano21');
        $new_user_3->address = 'Via Montenapoleone, Roma';
        $new_user_3->vat_id = 'IT00000001439';
        $new_user_3->restaurant_img = 'path/to/rest_image3.jpg';
        $new_user_3->created_at = now();
        $new_user_3->updated_at = now();
        $new_user_3->save();
        $new_user_3->types()->attach($faker->randomElements($type_ids, null));

        $new_user_4->business_name = 'Trattoria da Silvano';
        $new_user_4->slug = 'trattoria-da-silvano';
        $new_user_4->email = 'silvano.trattoria@gmail.com';
        $new_user_4->password = Hash::make('trattoria42');
        $new_user_4->address = 'Via Case Foresche, Roma';
        $new_user_4->vat_id = 'IT00000003478';
        $new_user_4->restaurant_img = 'path/to/rest_image4.jpg';
        $new_user_4->created_at = now();
        $new_user_4->updated_at = now();
        $new_user_4->save();
        $new_user_4->types()->attach($faker->randomElements($type_ids, null));

        $new_user_5->business_name = 'Pizzeria La Deliziosa';
        $new_user_5->slug = 'pizzeria-la-deliziosa';
        $new_user_5->email = 'la.deliziosa@gmail.com';
        $new_user_5->password = Hash::make('delicious');
        $new_user_5->address = 'Via Col Vento, Roma';
        $new_user_5->vat_id = 'IT00000058936';
        $new_user_5->restaurant_img = 'path/to/rest_image5.jpg';
        $new_user_5->created_at = now();
        $new_user_5->updated_at = now();
        $new_user_5->save();
        $new_user_5->types()->attach($faker->randomElements($type_ids, null));
    }
}



        // DB::table('users')->insert([
        //     'business_name' => 'Da Gianni',
        //     'slug' => 'da-gianni',
        //     'email' => 'giagianni@gmail.com',
        //     'password' => Hash::make('tobi1975'),
        //     'address' => 'Piazza di Spagna, Roma',
        //     'vat_id' => 'IT00000000459',
        //     'restaurant_img' => 'path/to/rest_image2.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('users')->insert([
        //     'business_name' => 'La Milanese',
        //     'slug' => 'la-milanese',
        //     'email' => 'milano21@gmail.com',
        //     'password' => Hash::make('milano21'),
        //     'address' => 'Via Montenapoleone, Roma',
        //     'vat_id' => 'IT00000001439',
        //     'restaurant_img' => 'path/to/rest_image3.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('users')->insert([
        //     'business_name' => 'Trattoria da Silvano',
        //     'slug' => 'trattoria-da-silvano',
        //     'email' => 'silvano.trattoria@gmail.com',
        //     'password' => Hash::make('trattoria42'),
        //     'address' => 'Via Case Foresche, Roma',
        //     'vat_id' => 'IT00000003478',
        //     'restaurant_img' => 'path/to/rest_image4.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('users')->insert([
        //     'business_name' => 'Pizzeria La Deliziosa',
        //     'slug' => 'pizzeria-la-deliziosa',
        //     'email' => 'la.deliziosa@gmail.com',
        //     'password' => Hash::make('delicious'),
        //     'address' => 'Via Col Vento, Roma',
        //     'vat_id' => 'IT00000058936',
        //     'restaurant_img' => 'path/to/rest_image5.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
