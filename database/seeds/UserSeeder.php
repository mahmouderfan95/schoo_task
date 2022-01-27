<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminCreate = \App\User::create([
           'name' => 'mahmoud',
           'email' => 'mahmoud@gmail.com',
           'password' => bcrypt(123123),
        ]);

        auth()->login($adminCreate);
    }
}
