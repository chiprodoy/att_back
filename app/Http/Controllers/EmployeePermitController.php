<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePermit;
use Illuminate\Support\Facades\Auth;

class EmployeePermitController extends Controller
{
    public function index()
    {
        $permits = EmployeePermit::with('user')->get();
        return view('employee_permit.index', compact('permits'));
    }

    public function create()
    {
        return view('employee_permit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_permit'   => 'required|date',
            'permit_status' => 'required|string|max:50',
        ]);

        $validated['USERID'] = Auth::id();

        EmployeePermit::create($validated);

        return redirect()->route('employee_permit.index')->with('success', 'Permit created.');
    }

    public function edit($id)
    {
        $permit = EmployeePermit::findOrFail($id);
        return view('employee_permit.edit', compact('permit'));
    }

    public function update(Request $request, $id)
    {
        $permit = EmployeePermit::findOrFail($id);

        $validated = $request->validate([
            'date_permit'   => 'required|date',
            'permit_status' => 'required|string|max:50',
        ]);

        $permit->update($validated);

        return redirect()->route('employee_permit.index')->with('success', 'Permit updated.');
    }

    public function destroy($id)
    {
        $permit = EmployeePermit::findOrFail($id);
        $permit->delete();

        return redirect()->route('employee_permit.index')->with('success', 'Permit deleted.');
    }
}
