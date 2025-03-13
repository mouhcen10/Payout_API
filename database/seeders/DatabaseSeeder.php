<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create Users
        $users = User::factory(3)->create();

        // Create Banks for Each User
        foreach ($users as $user) {
            Bank::create([
                'user_id' => $user->id,
                'bank_name' => 'Bank ' . Str::random(5),
                'bank_country' => 'United Kingdom',
                'country_iso' => 'GB',
                'iban' => 'GB' . rand(100000000000000000, 999999999999999999),
                'bic' => Str::upper(Str::random(11)),
            ]);
        }

        // Create Payouts
        foreach ($users as $user) {
            $bank = $user->banks()->first();
            if ($bank) {
                Payout::create([
                    'user_id' => $user->id,
                    'bank_id' => $bank->id,
                    'amount' => rand(100, 1000),
                    'status' => 'pending',
                ]);
            }
        }
    }
}
