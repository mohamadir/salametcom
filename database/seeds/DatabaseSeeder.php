<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->truncate();
        factory(App\User::class,200)->create();
        DB::table('users')->insert([
            'name' => 'محمد ابراهيم',
            'is_admin' =>  1,
            'email' => 'mohamdib@gmail.com' ,
            'password' => '123456' ,
            'phone' => '0509840407',
            'area' => 'ابوغوش' 
        ]);
        DB::table('users')->insert([
            'name' => 'يعقوب ابراهيم',
            'is_admin' =>  1,
            'email' => 'yaqob@gmail.com' ,
            'password' => '123456' ,
            'phone' => '0545444704',
            'area' => 'ابوغوش' 
        ]);
    }
}
