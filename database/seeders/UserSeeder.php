<?php

namespace Database\Seeders;

use App\Models\User;
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
       User::create([
            'name'=>'Jesmary Carneiro',
            'email'=>'jesmary885@gmail.com',
            'password'=>bcrypt('123456789')

        ])->assignRole('Admin');

        User::factory(5)->create();
    }
}
