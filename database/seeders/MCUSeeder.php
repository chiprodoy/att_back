<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MCU;
use App\Models\User;
use Carbon\Carbon;

class MCUSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            MCU::create([
                'USERID' => $userIds[array_rand($userIds)],
                'mcu_date' => Carbon::now()->subDays(rand(0, 365))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}