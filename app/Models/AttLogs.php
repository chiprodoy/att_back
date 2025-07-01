<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttLogs extends Model
{
    use HasFactory;

    protected $table = 'att_logs';

    protected $fillable = [
        'USERID',
        'checklog_time',
        'shift_in',
        'shift_out',
        'checkin_time1',
        'checkin_time2',
        'checkout_time1',
        'checkout_time2',
        'check_type',
        'late_tolerance',
        'early_tolerance',
        'sdays',
        'late',
        'early_checkin',
        'overtime',
        'early_checkout',
        'check_log_status',
        'departement_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'USERID', 'id');
    }
}