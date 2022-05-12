<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'William',
                    'email' => 'william@thfos.com',
                    'password' =>  Hash::make('william@thfos2510')
                        ]);
        User::create(['name' => 'Enola',
                    'email' => 'enola@thfos.com',
                    'password' =>  Hash::make('enola@thfos8540')
                        ]);
    }
}
