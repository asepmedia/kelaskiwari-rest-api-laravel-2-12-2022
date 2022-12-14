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
        //
        $users = [
            [
                'name'      => 'KelasKiwari',
                'email'     => 'cs@kelaskiwari.com',
                'password'  => bcrypt('123456')
            ]
        ];

        User::insert($users);
    }
}
