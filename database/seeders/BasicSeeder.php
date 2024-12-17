<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => '1045 Rizal Bagus Hidayat',
            'email' => 'rizalbagushidayatt@gmail.com',
            'email_verified_at' => null,
            'password' => '7Me7oMphRF6BD7W8zAtALR3NWLkaI3Ae',
            'provider_id' => '103681132856993978589',
            'remember_token' => null,
            'created_at' => '2024-12-15 18:28:16',
            'updated_at' => '2024-12-15 18:28:16',
        ]);

        Platform::create([
            'name' => 'Google',
            'icon' => 'google.svg',
            'is_editable' => '0',
            'created_at' => '2024-12-15 18:29:16',
            'updated_at' => '2024-12-15 18:29:16',
        ]);
        Platform::create([
            'name' => 'Facebook',
            'icon' => 'facebook.svg',
            'is_editable' => '0',
            'created_at' => '2024-12-15 18:29:16',
            'updated_at' => '2024-12-15 18:29:16',
        ]);

        Account::create([
            'user_id' => 1,
            'platform_id' => 1,
            'account_details' => null,
            'notes' => null,
            'created_at' => '2024-12-15 18:30:16',
            'updated_at' => '2024-12-15 18:30:16',
        ]);

        Account::create([
            'user_id' => 1,
            'platform_id' => 2,
            'account_details' => null,
            'notes' => null,
            'created_at' => '2024-12-15 18:30:25',
            'updated_at' => '2024-12-15 18:30:25',
        ]);
    }
}
