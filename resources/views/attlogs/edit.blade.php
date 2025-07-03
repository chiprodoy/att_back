@extends('layouts.app')

@section('title', 'Edit Attendance Log')

@section('header')
    <h1 class="m-0">Edit Attendance Log</h1>
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form method="POST" action="{{ route('attendence.update', $attlog->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Checklog Time</label>
                        <input type="datetime-local" name="checklog_time" class="form-control"
                            value="{{ old('checklog_time', \Carbon\Carbon::parse($attlog->checklog_time)->format('Y-m-d\TH:i')) }}">
                        @error('checklog_time') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Shift In</label>
                        <input type="datetime-local" name="shift_in" class="form-control"
                            value="{{ old('shift_in', \Carbon\Carbon::parse($attlog->shift_in)->format('Y-m-d\TH:i')) }}">
                        @error('shift_in') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Shift Out</label>
                        <input type="datetime-local" name="shift_out" class="form-control"
                            value="{{ old('shift_out', \Carbon\Carbon::parse($attlog->shift_out)->format('Y-m-d\TH:i')) }}">
                        @error('shift_out') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Checkin Time 1</label>
                        <input type="datetime-local" name="checkin_time1" class="form-control"
                            value="{{ old('checkin_time1', \Carbon\Carbon::parse($attlog->checkin_time1)->format('Y-m-d\TH:i')) }}">
                        @error('checkin_time1') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Checkin Time 2</label>
                        <input type="datetime-local" name="checkin_time2" class="form-control"
                            value="{{ old('checkin_time2', \Carbon\Carbon::parse($attlog->checkin_time2)->format('Y-m-d\TH:i')) }}">
                        @error('checkin_time2') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Checkout Time 1</label>
                        <input type="datetime-local" name="checkout_time1" class="form-control"
                            value="{{ old('checkout_time1', \Carbon\Carbon::parse($attlog->checkout_time1)->format('Y-m-d\TH:i')) }}">
                        @error('checkout_time1') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Checkout Time 2</label>
                        <input type="datetime-local" name="checkout_time2" class="form-control"
                            value="{{ old('checkout_time2', \Carbon\Carbon::parse($attlog->checkout_time2)->format('Y-m-d\TH:i')) }}">
                        @error('checkout_time2') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Check Type</label>
                        <input type="number" name="check_type" class="form-control"
                            value="{{ old('check_type', $attlog->check_type) }}">
                        @error('check_type') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Late Tolerance</label>
                        <input type="number" name="late_tolerance" class="form-control"
                            value="{{ old('late_tolerance', $attlog->late_tolerance) }}">
                        @error('late_tolerance') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Early Tolerance</label>
                        <input type="number" name="early_tolerance" class="form-control"
                            value="{{ old('early_tolerance', $attlog->early_tolerance) }}">
                        @error('early_tolerance') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Sdays</label>
                        <input type="number" name="sdays" class="form-control"
                            value="{{ old('sdays', $attlog->sdays) }}">
                        @error('sdays') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Late</label>
                        <input type="number" name="late" class="form-control"
                            value="{{ old('late', $attlog->late) }}">
                        @error('late') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Early Checkin</label>
                        <input type="number" name="early_checkin" class="form-control"
                            value="{{ old('early_checkin', $attlog->early_checkin) }}">
                        @error('early_checkin') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Overtime</label>
                        <input type="number" name="overtime" class="form-control"
                            value="{{ old('overtime', $attlog->overtime) }}">
                        @error('overtime') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Early Checkout</label>
                        <input type="number" name="early_checkout" class="form-control"
                            value="{{ old('early_checkout', $attlog->early_checkout) }}">
                        @error('early_checkout') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Check Log Status</label>
                        <input type="number" name="check_log_status" class="form-control"
                            value="{{ old('check_log_status', $attlog->check_log_status) }}">
                        @error('check_log_status') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label>Departement Name</label>
                        <input type="text" name="departement_name" class="form-control"
                            value="{{ old('departement_name', $attlog->departement_name) }}">
                        @error('departement_name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning mt-3">Update</button>
            <a href="{{ route('attendence.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
</div>
@endsection