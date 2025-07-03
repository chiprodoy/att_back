<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MCU;
use App\Models\EmployeePermit;

class DashboardController extends Controller
{
    public function index()
    {
        $mcuCount = MCU::count();

        $statusList = [1 => 'Cuti', 2 => 'Sakit', 3 => 'Izin', 4 => 'Alfa'];
        $permitCounts = EmployeePermit::selectRaw('permit_status, COUNT(*) as total')
            ->groupBy('permit_status')
            ->pluck('total', 'permit_status')
            ->toArray();

        $chartLabels = [];
        $chartData = [];
        foreach ($statusList as $key => $label) {
            $chartLabels[] = $label;
            $chartData[] = $permitCounts[$key] ?? 0;
        }

        return view('dashboard', compact('mcuCount', 'chartLabels', 'chartData'));
    }
}
