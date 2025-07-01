<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Userinfo extends Model
{
    use HasFactory;

    protected $table = 'userinfo';
    protected $primaryKey = 'USERID';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'USERID',
        'Badgenumber',
        'SSN',
        'Name',
        'Gender',
        'TITLE',
        'PAGER',
        'BIRTHDAY',
        'HIREDDAY',
        'street',
        'CITY',
        'STATE',
        'ZIP',
        'OPHONE',
        'FPHONE',
        'VERIFICATIONMETHOD',
        'DEFAULTDEPTID',
        'SECURITYFLAGS',
        'ATT',
        'INLATE',
        'OUTEARLY',
        'OVERTIME',
        'SEP',
        'HOLIDAY',
        'MINZU',
        'PASSWORD',
        'LUNCHDURATION',
        'PHOTO',
        'mverifypass',
        'Notes',
        'privilege',
        'InheritDeptSch',
        'InheritDeptSchClass',
        'AutoSchPlan',
        'MinAutoSchInterval',
        'RegisterOT',
        'InheritDeptRule',
        'EMPRIVILEGE',
        'CardNo',
        'FaceGroup',
        'AccGroup',
        'UseAccGroupTZ',
        'VerifyCode',
        'Expires',
        'ValidCount',
        'ValidTimeBegin',
        'ValidTimeEnd',
        'TimeZone1',
        'TimeZone2',
        'TimeZone3',
        'IDCardNo',
        'IDCardValidTime',
        'EMail',
        'IDCardName',
        'IDCardBirth',
        'IDCardSN',
        'IDCardDN',
        'IDCardAddr',
        'IDCardNewAddr',
        'IDCardISSUER',
        'IDCardGender',
        'IDCardNation',
        'IDCardReserve',
        'IDCardNotice',
        'IDCard_MainCard',
        'IDCard_ViceCard',
        'FSelected',
        'Pin1',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'USERID', 'id');
    }
}

