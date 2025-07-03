<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePermit;
use App\Models\User;
use Carbon\Carbon;

class EmployeePermitController extends Controller
{
    public function index(Request $request)
    {
        $query = EmployeePermit::with('user');

        if ($request->filled('nama')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->nama . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('date_permit', $request->tanggal);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('date_permit', $request->tahun);
        }

        if ($request->filled('status')) {
            $query->where('permit_status', $request->status);
        }

        $permits = $query->paginate(10)->withQueryString();

        return view('employee_permit.index', compact('permits'));
    }

    public function create()
    {
        $users = User::role(['sdm', 'user'])->get();
        $now = Carbon::now()->format('Y-m-d');
        return view('employee_permit.create', compact('users', 'now'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'USERID'        => 'required|exists:users,id',
            'permit_status' => 'required|string|max:50',
        ]);

        $validated['date_permit'] = Carbon::now();

        EmployeePermit::create($validated);

        return redirect()->route('employee_permit.index')->with('success', 'Permit created.');
    }

    public function edit($id)
    {
        $permit = EmployeePermit::findOrFail($id);
        $users = User::role(['sdm', 'user'])->get();
        return view('employee_permit.edit', compact('permit', 'users'));
    }

    public function update(Request $request, $id)
    {
        $permit = EmployeePermit::findOrFail($id);

        $validated = $request->validate([
            'USERID'        => 'required|exists:users,id',
            'permit_status' => 'required|string|max:50',
        ]);

        $permit->update([
            'USERID'        => $validated['USERID'],
            'permit_status' => $validated['permit_status'],
        ]);

        return redirect()->route('employee_permit.index')->with('success', 'Permit updated.');
    }

    public function destroy($id)
    {
        $permit = EmployeePermit::findOrFail($id);
        $permit->delete();

        return redirect()->route('employee_permit.index')->with('success', 'Permit deleted.');
    }
}
