<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $vat = Setting::where('type', "Vat")->first();
        return view('admin.pages.Setting.Vat_setting', compact('vat'));
    }
    public function update(Request $request)
    {
        $vat = Setting::where('type', "Vat")->first();
        $vat->amount = $request->vat_amount;
        $vat->save();
        session()->flash("Vat Amount Updated Successfully");
        return redirect()->back();
    }
}
