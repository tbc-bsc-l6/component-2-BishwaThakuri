<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'special1320.bishwa@gmail.com')->first();

        if (!$user) {
        	User::create([
        		'name' => 'Bishwa Thakuri',
        		'email' => 'special1320.bishwa@gmail.com',
        		'role' => 'admin',
                'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
        		'password' => Hash::make('bishwa1320')
        	]);
        }
    }
}
