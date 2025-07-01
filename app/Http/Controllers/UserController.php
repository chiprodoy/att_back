<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function storeUserInfo(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'Badgenumber'      => 'required|string|max:24',
            'SSN'              => 'nullable|string|max:20',
            'Name'             => 'required|string|max:40',
            'Gender'           => 'nullable|string|max:8',
            'TITLE'            => 'nullable|string|max:20',
            'PAGER'            => 'nullable|string|max:20',
            'BIRTHDAY'         => 'nullable|date',
            'HIREDDAY'         => 'nullable|date',
            'street'           => 'nullable|string|max:80',
            'CITY'             => 'nullable|string|max:2',
            'STATE'            => 'nullable|string|max:2',
            'ZIP'              => 'nullable|string|max:12',
            'OPHONE'           => 'nullable|string|max:20',
            'FPHONE'           => 'nullable|string|max:20',
            'VERIFICATIONMETHOD' => 'nullable|integer',
            'DEFAULTDEPTID'    => 'nullable|integer',
            'SECURITYFLAGS'    => 'nullable|integer',
            'ATT'              => 'nullable|integer',
            'INLATE'           => 'nullable|integer',
            'OUTEARLY'         => 'nullable|integer',
            'OVERTIME'         => 'nullable|integer',
            'SEP'              => 'nullable|integer',
            'HOLIDAY'          => 'nullable|integer',
            'MINZU'            => 'nullable|string|max:8',
            'PASSWORD'         => 'nullable|string|max:50',
            'LUNCHDURATION'    => 'nullable|integer',
            'PHOTO'            => 'nullable',
            'mverifypass'      => 'nullable|string|max:10',
            'Notes'            => 'nullable',
            'privilege'        => 'nullable|integer',
            'InheritDeptSch'   => 'nullable|integer',
            'InheritDeptSchClass' => 'nullable|integer',
            'AutoSchPlan'      => 'nullable|integer',
            'MinAutoSchInterval' => 'nullable|integer',
            'RegisterOT'       => 'nullable|integer',
            'InheritDeptRule'  => 'nullable|integer',
            'EMPRIVILEGE'      => 'nullable|integer',
            'CardNo'           => 'nullable|string|max:20',
            'FaceGroup'        => 'nullable|integer',
            'AccGroup'         => 'nullable|integer',
            'UseAccGroupTZ'    => 'nullable|integer',
            'VerifyCode'       => 'nullable|integer',
            'Expires'          => 'nullable|integer',
            'ValidCount'       => 'nullable|integer',
            'ValidTimeBegin'   => 'nullable|date',
            'ValidTimeEnd'     => 'nullable|date',
            'TimeZone1'        => 'nullable|integer',
            'TimeZone2'        => 'nullable|integer',
            'TimeZone3'        => 'nullable|integer',
            'IDCardNo'         => 'nullable|string|max:18',
            'IDCardValidTime'  => 'nullable|string|max:32',
            'EMail'            => 'nullable|email|max:100',
            'IDCardName'       => 'nullable|string|max:30',
            'IDCardBirth'      => 'nullable|string|max:16',
            'IDCardSN'         => 'nullable|string|max:24',
            'IDCardDN'         => 'nullable|string|max:24',
            'IDCardAddr'       => 'nullable|string|max:70',
            'IDCardNewAddr'    => 'nullable|string|max:255',
            'IDCardISSUER'     => 'nullable|string|max:32',
            'IDCardGender'     => 'nullable|integer',
            'IDCardNation'     => 'nullable|integer',
            'IDCardReserve'    => 'nullable|string|max:36',
            'IDCardNotice'     => 'nullable|string|max:255',
            'IDCard_MainCard'  => 'nullable|string|max:24',
            'IDCard_ViceCard'  => 'nullable|string|max:24',
            'FSelected'        => 'nullable|integer',
            'Pin1'             => 'nullable|integer',
        ]);

        $userinfo = Userinfo::updateOrCreate(
            ['USERID' => $user->id],
            array_merge($validated, ['USERID' => $user->id])
        );

        return redirect()->route('profile')->with('success', 'User info saved successfully');
    }
}