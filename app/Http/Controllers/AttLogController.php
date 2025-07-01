<?php

namespace App\Http\Controllers;

use App\Models\AttLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttLogController extends Controller
{
    public function index()
    {
        $attlogs = AttLogs::with('user')->get();

        return view('attlogs.index', compact('attlogs'));
    }

    public function create()
    {
        return view('attlogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'checklog_time'     => 'required|date',
            'shift_in'          => 'required|date',
            'shift_out'         => 'required|date',
            'checkin_time1'     => 'required|date',
            'checkin_time2'     => 'required|date',
            'checkout_time1'    => 'required|date',
            'checkout_time2'    => 'required|date',
            'check_type'        => 'required|integer',
            'late_tolerance'    => 'required|integer',
            'early_tolerance'   => 'required|integer',
            'sdays'             => 'required|integer',
            'late'              => 'required|integer',
            'early_checkin'     => 'required|integer',
            'overtime'          => 'required|integer',
            'early_checkout'    => 'required|integer',
            'check_log_status'  => 'required|integer',
            'departement_name'  => 'required|string|max:255',
        ]);

        $validated['USERID'] = Auth::id();

        AttLogs::create($validated);

        return redirect()->route('attendence.index')->with('success', 'Attendance log created successfully.');
    }

    public function show($id)
    {
        $attlog = AttLogs::findOrFail($id);

        return view('attlogs.show', compact('attlog'));
    }

    public function edit($id)
    {
        $attlog = AttLogs::findOrFail($id);

        return view('attlogs.edit', compact('attlog'));
    }

    public function update(Request $request, $id)
    {
        $attlog = AttLogs::findOrFail($id);

        $validated = $request->validate([
            'checklog_time'     => 'required|date',
            'shift_in'          => 'required|date',
            'shift_out'         => 'required|date',
            'checkin_time1'     => 'required|date',
            'checkin_time2'     => 'required|date',
            'checkout_time1'    => 'required|date',
            'checkout_time2'    => 'required|date',
            'check_type'        => 'required|integer',
            'late_tolerance'    => 'required|integer',
            'early_tolerance'   => 'required|integer',
            'sdays'             => 'required|integer',
            'late'              => 'required|integer',
            'early_checkin'     => 'required|integer',
            'overtime'          => 'required|integer',
            'early_checkout'    => 'required|integer',
            'check_log_status'  => 'required|integer',
            'departement_name'  => 'required|string|max:255',
        ]);

        $attlog->update($validated);

        return redirect()->route('attendence.index')->with('success', 'Attendance log updated successfully.');
    }

    public function destroy($id)
    {
        $attlog = AttLogs::findOrFail($id);
        $attlog->delete();

        return redirect()->route('attendence.index')->with('success', 'Attendance log deleted successfully.');
    }
}
