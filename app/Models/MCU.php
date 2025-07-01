<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCU extends Model
{
    use HasFactory;

    protected $table = 'mcu';

    protected $fillable = [
        'USERID',
        'mcu_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'USERID', 'id');
    }
}
