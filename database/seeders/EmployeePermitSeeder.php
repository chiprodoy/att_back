<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeePermit;
use App\Models\User;
use Carbon\Carbon;

class EmployeePermitSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            EmployeePermit::create([
                'USERID'        => $userIds[array_rand($userIds)],
                'permit_status' => rand(1, 4),
                'date_permit'   => Carbon::now()->subDays(rand(0, 60)),
            ]);
        }
    }
}