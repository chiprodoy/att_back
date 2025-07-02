<?php

namespace App\Http\Controllers;

use App\Models\MCU;
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
        return view('mcu.create');
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
                        'mcu_date' => 'required|date',
                    ]);

        $validated['USERID'] = Auth::id();

        MCU::create($validated);

        return redirect()->route('mcu.index')->with('success', 'MCU created successfully.');
    }

    public function edit($id)
    {
        $mcu = MCU::findOrFail($id);

        return view('mcu.edit', compact('mcu'));
    }

    public function update(Request $request, $id)
    {
        $mcu = MCU::findOrFail($id);

        $validated = $request->validate([
            'mcu_date' => 'required|date',
        ]);

        $mcu->update($validated);

        return redirect()->route('mcu.index')->with('success', 'MCU updated successfully.');
    }

    public function destroy($id)
    {
        $mcu = MCU::findOrFail($id);
        $mcu->delete();

        return redirect()->route('mcu.index')->with('success', 'MCU deleted successfully.');
    }
}
