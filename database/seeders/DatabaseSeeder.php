<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->where('id', '>', '4')->delete();
        DB::table('categories')->insert([
            'name' => 'Translator',
        ]);
        DB::table('categories')->insert([
            'name' => 'Designer',
        ]);
        DB::table('categories')->insert([
            'name' => 'Photographer',
        ]);
        DB::table('categories')->insert([
            'name' => 'Programming',
        ]);
        DB::table('users')->insert([
            'name' => 'Trial User',
            'email' => 'testt@test.com',
            'password' => bcrypt('123456789')
        ]);
        DB::table('sellers')->insert([
            'user_id' => '1',
            'sellername' => 'Trial Seller',
            'address' => 'Semarang',
            'url' => 'http://youtube.com',
            'image' => 'tXVh9GNK7ipE13C9q2LBz3d51TiEgJ7kfDflUdin.jpg',
            'description' => 'This is my Toko Legitimate Tokoo'
        ]);
        DB::table('services')->insert([
            'name' => 'I will create your website',
            'seller_id' => '1',
            'category_id' => '3',
            'price' => '100000',
            'description' => 'I will create your website using laravel and react trust me it works',
            'delivery_time' => '3',
            'revision_time' => '5',
            'image' => 'Q9mKsJMGTeRbYwJiHxzT86lN4rZ5tTvjXdEeOLvp.jpg'
        ]);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
    }
}
