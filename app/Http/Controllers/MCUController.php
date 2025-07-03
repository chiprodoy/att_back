<?php

namespace App\Http\Controllers;

use App\Models\MCU;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MCUController extends Controller
{
    public function index()
    {
        $mcu = MCU::with('user')->get();

        return view('mcu.index', compact('mcu'));
    }

    public function create()
    {
        $users = User::role(['sdm', 'user'])->get();
        $now = Carbon::now()->format('Y-m-d\TH:i');
        return view('mcu.create', compact('users', 'now'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'USERID' => 'required|exists:users,id',
        ]);

        $validated['mcu_date'] = Carbon::now();

        MCU::create($validated);

        return redirect()->route('mcu.index')->with('success', 'MCU created successfully.');
    }

    public function edit($id)
    {
        $mcu = MCU::findOrFail($id);
        $users = User::role(['sdm', 'user'])->get();
        return view('mcu.edit', compact('mcu', 'users'));
    }

    public function update(Request $request, $id)
    {
        $mcu = MCU::findOrFail($id);

        $validated = $request->validate([
            'USERID' => 'required|exists:users,id',
        ]);

        $mcu->update([
            'USERID' => $validated['USERID'],
        ]);

        return redirect()->route('mcu.index')->with('success', 'MCU updated successfully.');
    }

    public function destroy($id)
    {
        $mcu = MCU::findOrFail($id);
        $mcu->delete();

        return redirect()->route('mcu.index')->with('success', 'MCU deleted successfully.');
    }
}
