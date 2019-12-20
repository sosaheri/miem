<?php

use App\User;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'Mavarezi1900@gmail.com',
            'password' => bcrypt('admin1234'),
            
        ]);
    }
}
