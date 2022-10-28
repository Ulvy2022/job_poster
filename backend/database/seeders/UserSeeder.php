<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $admine = new \App\Models\User();
        $admine->fullName = 'Admine App';
        $admine->role = 'Admine';
        $admine->email = 'admine@gmail.com';
        $admine->password = bcrypt('077257675');
        $admine->save();
    }
}
