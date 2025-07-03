<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lengkapi Data User Info</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Lengkapi Data User Info</h2>

         @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('userinfo.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Badgenumber</label>
                    <input type="text" name="Badgenumber" class="w-full border rounded px-3 py-2" value="{{ old('Badgenumber', $userinfo->Badgenumber ?? '') }}">
                    @error('Badgenumber') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="Name" class="w-full border rounded px-3 py-2"
                        value="{{ old('Name', Auth::user()->name) }}">
                    @error('Name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">Gender</label>
                    <select name="Gender" id="Gender">
                        <option value="">-Pilih-</option>
                        <option value="L" {{ old('Gender', $userinfo->Gender) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('Gender', $userinfo->Gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold mb-1">TITLE</label>
                    <input type="text" name="TITLE" class="w-full border rounded px-3 py-2" value="{{ old('TITLE', $userinfo->TITLE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">BIRTHDAY</label>
                    <input type="date" name="BIRTHDAY" class="w-full border rounded px-3 py-2" value="{{ old('BIRTHDAY', isset($userinfo->BIRTHDAY) ? \Carbon\Carbon::parse($userinfo->BIRTHDAY)->format('Y-m-d') : '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">CITY</label>
                    <input type="text" name="CITY" class="w-full border rounded px-3 py-2" value="{{ old('CITY', $userinfo->CITY ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">STATE</label>
                    <input type="text" name="STATE" class="w-full border rounded px-3 py-2" value="{{ old('STATE', $userinfo->STATE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">ZIP</label>
                    <input type="text" name="ZIP" class="w-full border rounded px-3 py-2" value="{{ old('ZIP', $userinfo->ZIP ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">OPHONE</label>
                    <input type="text" name="OPHONE" class="w-full border rounded px-3 py-2" value="{{ old('OPHONE', $userinfo->OPHONE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">FPHONE</label>
                    <input type="text" name="FPHONE" class="w-full border rounded px-3 py-2" value="{{ old('FPHONE', $userinfo->FPHONE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">VERIFICATIONMETHOD</label>
                    <input type="number" name="VERIFICATIONMETHOD" class="w-full border rounded px-3 py-2" value="{{ old('VERIFICATIONMETHOD', $userinfo->VERIFICATIONMETHOD ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">DEFAULTDEPTID</label>
                    <input type="number" name="DEFAULTDEPTID" class="w-full border rounded px-3 py-2" value="{{ old('DEFAULTDEPTID', $userinfo->DEFAULTDEPTID ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">SECURITYFLAGS</label>
                    <input type="number" name="SECURITYFLAGS" class="w-full border rounded px-3 py-2" value="{{ old('SECURITYFLAGS', $userinfo->SECURITYFLAGS ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">ATT</label>
                    <input type="number" name="ATT" class="w-full border rounded px-3 py-2" value="{{ old('ATT', $userinfo->ATT ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">INLATE</label>
                    <input type="number" name="INLATE" class="w-full border rounded px-3 py-2" value="{{ old('INLATE', $userinfo->INLATE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">OUTEARLY</label>
                    <input type="number" name="OUTEARLY" class="w-full border rounded px-3 py-2" value="{{ old('OUTEARLY', $userinfo->OUTEARLY ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">OVERTIME</label>
                    <input type="number" name="OVERTIME" class="w-full border rounded px-3 py-2" value="{{ old('OVERTIME', $userinfo->OVERTIME ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">SEP</label>
                    <input type="number" name="SEP" class="w-full border rounded px-3 py-2" value="{{ old('SEP', $userinfo->SEP ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">HOLIDAY</label>
                    <input type="number" name="HOLIDAY" class="w-full border rounded px-3 py-2" value="{{ old('HOLIDAY', $userinfo->HOLIDAY ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">MINZU</label>
                    <input type="text" name="MINZU" class="w-full border rounded px-3 py-2" value="{{ old('MINZU', $userinfo->MINZU ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">PASSWORD</label>
                    <input type="text" name="PASSWORD" class="w-full border rounded px-3 py-2" value="{{ old('PASSWORD', $userinfo->PASSWORD ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">LUNCHDURATION</label>
                    <input type="number" name="LUNCHDURATION" class="w-full border rounded px-3 py-2" value="{{ old('LUNCHDURATION', $userinfo->LUNCHDURATION ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">PHOTO</label>
                    <input type="text" name="PHOTO" class="w-full border rounded px-3 py-2" value="{{ old('PHOTO', $userinfo->PHOTO ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">mverifypass</label>
                    <input type="text" name="mverifypass" class="w-full border rounded px-3 py-2" value="{{ old('mverifypass', $userinfo->mverifypass ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Notes</label>
                    <input type="text" name="Notes" class="w-full border rounded px-3 py-2" value="{{ old('Notes', $userinfo->Notes ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">privilege</label>
                    <input type="number" name="privilege" class="w-full border rounded px-3 py-2" value="{{ old('privilege', $userinfo->privilege ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">InheritDeptSch</label>
                    <input type="number" name="InheritDeptSch" class="w-full border rounded px-3 py-2" value="{{ old('InheritDeptSch', $userinfo->InheritDeptSch ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">InheritDeptSchClass</label>
                    <input type="number" name="InheritDeptSchClass" class="w-full border rounded px-3 py-2" value="{{ old('InheritDeptSchClass', $userinfo->InheritDeptSchClass ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">AutoSchPlan</label>
                    <input type="number" name="AutoSchPlan" class="w-full border rounded px-3 py-2" value="{{ old('AutoSchPlan', $userinfo->AutoSchPlan ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">MinAutoSchInterval</label>
                    <input type="number" name="MinAutoSchInterval" class="w-full border rounded px-3 py-2" value="{{ old('MinAutoSchInterval', $userinfo->MinAutoSchInterval ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">RegisterOT</label>
                    <input type="number" name="RegisterOT" class="w-full border rounded px-3 py-2" value="{{ old('RegisterOT', $userinfo->RegisterOT ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">InheritDeptRule</label>
                    <input type="number" name="InheritDeptRule" class="w-full border rounded px-3 py-2" value="{{ old('InheritDeptRule', $userinfo->InheritDeptRule ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">EMPRIVILEGE</label>
                    <input type="number" name="EMPRIVILEGE" class="w-full border rounded px-3 py-2" value="{{ old('EMPRIVILEGE', $userinfo->EMPRIVILEGE ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">CardNo</label>
                    <input type="text" name="CardNo" class="w-full border rounded px-3 py-2" value="{{ old('CardNo', $userinfo->CardNo ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">FaceGroup</label>
                    <input type="number" name="FaceGroup" class="w-full border rounded px-3 py-2" value="{{ old('FaceGroup', $userinfo->FaceGroup ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">AccGroup</label>
                    <input type="number" name="AccGroup" class="w-full border rounded px-3 py-2" value="{{ old('AccGroup', $userinfo->AccGroup ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">UseAccGroupTZ</label>
                    <input type="number" name="UseAccGroupTZ" class="w-full border rounded px-3 py-2" value="{{ old('UseAccGroupTZ', $userinfo->UseAccGroupTZ ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">VerifyCode</label>
                    <input type="number" name="VerifyCode" class="w-full border rounded px-3 py-2" value="{{ old('VerifyCode', $userinfo->VerifyCode ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Expires</label>
                    <input type="number" name="Expires" class="w-full border rounded px-3 py-2" value="{{ old('Expires', $userinfo->Expires ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">ValidCount</label>
                    <input type="number" name="ValidCount" class="w-full border rounded px-3 py-2" value="{{ old('ValidCount', $userinfo->ValidCount ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">ValidTimeBegin</label>
                    <input type="date" name="ValidTimeBegin" class="w-full border rounded px-3 py-2" value="{{ old('ValidTimeBegin', isset($userinfo->ValidTimeBegin) ? \Carbon\Carbon::parse($userinfo->ValidTimeBegin)->format('Y-m-d') : '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">ValidTimeEnd</label>
                    <input type="date" name="ValidTimeEnd" class="w-full border rounded px-3 py-2" value="{{ old('ValidTimeEnd', isset($userinfo->ValidTimeEnd) ? \Carbon\Carbon::parse($userinfo->ValidTimeEnd)->format('Y-m-d') : '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">TimeZone1</label>
                    <input type="number" name="TimeZone1" class="w-full border rounded px-3 py-2" value="{{ old('TimeZone1', $userinfo->TimeZone1 ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">TimeZone2</label>
                    <input type="number" name="TimeZone2" class="w-full border rounded px-3 py-2" value="{{ old('TimeZone2', $userinfo->TimeZone2 ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">TimeZone3</label>
                    <input type="number" name="TimeZone3" class="w-full border rounded px-3 py-2" value="{{ old('TimeZone3', $userinfo->TimeZone3 ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardNo</label>
                    <input type="text" name="IDCardNo" class="w-full border rounded px-3 py-2" value="{{ old('IDCardNo', $userinfo->IDCardNo ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardValidTime</label>
                    <input type="text" name="IDCardValidTime" class="w-full border rounded px-3 py-2" value="{{ old('IDCardValidTime', $userinfo->IDCardValidTime ?? '') }}">
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="EMail" class="w-full border rounded px-3 py-2"
                        value="{{ old('EMail', Auth::user()->email) }}">
                    @error('EMail') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardName</label>
                    <input type="text" name="IDCardName" class="w-full border rounded px-3 py-2" value="{{ old('IDCardName', $userinfo->IDCardName ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardBirth</label>
                    <input type="text" name="IDCardBirth" class="w-full border rounded px-3 py-2" value="{{ old('IDCardBirth', $userinfo->IDCardBirth ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardSN</label>
                    <input type="text" name="IDCardSN" class="w-full border rounded px-3 py-2" value="{{ old('IDCardSN', $userinfo->IDCardSN ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardDN</label>
                    <input type="text" name="IDCardDN" class="w-full border rounded px-3 py-2" value="{{ old('IDCardDN', $userinfo->IDCardDN ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardAddr</label>
                    <input type="text" name="IDCardAddr" class="w-full border rounded px-3 py-2" value="{{ old('IDCardAddr', $userinfo->IDCardAddr ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardNewAddr</label>
                    <input type="text" name="IDCardNewAddr" class="w-full border rounded px-3 py-2" value="{{ old('IDCardNewAddr', $userinfo->IDCardNewAddr ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardISSUER</label>
                    <input type="text" name="IDCardISSUER" class="w-full border rounded px-3 py-2" value="{{ old('IDCardISSUER', $userinfo->IDCardISSUER ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardGender</label>
                    <input type="number" name="IDCardGender" class="w-full border rounded px-3 py-2" value="{{ old('IDCardGender', $userinfo->IDCardGender ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardNation</label>
                    <input type="number" name="IDCardNation" class="w-full border rounded px-3 py-2" value="{{ old('IDCardNation', $userinfo->IDCardNation ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardReserve</label>
                    <input type="text" name="IDCardReserve" class="w-full border rounded px-3 py-2" value="{{ old('IDCardReserve', $userinfo->IDCardReserve ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCardNotice</label>
                    <input type="text" name="IDCardNotice" class="w-full border rounded px-3 py-2" value="{{ old('IDCardNotice', $userinfo->IDCardNotice ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCard_MainCard</label>
                    <input type="text" name="IDCard_MainCard" class="w-full border rounded px-3 py-2" value="{{ old('IDCard_MainCard', $userinfo->IDCard_MainCard ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">IDCard_ViceCard</label>
                    <input type="text" name="IDCard_ViceCard" class="w-full border rounded px-3 py-2" value="{{ old('IDCard_ViceCard', $userinfo->IDCard_ViceCard ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">FSelected</label>
                    <input type="number" name="FSelected" class="w-full border rounded px-3 py-2" value="{{ old('FSelected', $userinfo->FSelected ?? '') }}">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Pin1</label>
                    <input type="number" name="Pin1" class="w-full border rounded px-3 py-2" value="{{ old('Pin1', $userinfo->Pin1 ?? '') }}">
                </div>
            </div>
            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('userinfo') }}" class="mt-2 block text-center text-blue-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>