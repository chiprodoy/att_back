<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePermit extends Model
{
    use HasFactory;

    protected $table = 'employee_permit';

    protected $fillable = [
        'date_permit',
        'USERID',
        'permit_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'USERID', 'id');
    }
}
