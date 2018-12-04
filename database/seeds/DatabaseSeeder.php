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
        DB::table('transports')->truncate();
        DB::table('tools')->truncate();
        DB::table('helps')->truncate();
        DB::table('donates')->truncate();
        factory(App\User::class,200)->create();
        factory(App\Transport::class,40)->create();
        factory(App\Tool::class,25)->create();
        factory(App\Help::class,29)->create();
        factory(App\Donate::class,12)->create();
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
