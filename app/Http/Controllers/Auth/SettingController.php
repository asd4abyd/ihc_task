<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

class SettingController extends Controller
{
    public function setting()
    {
        return view('auth.setting');
    }

    public function save(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($valid->fails()) {

            return redirect()
                ->back()
                ->withErrors($valid)
                ->withInput();
        }

        $user = auth()->user();

        $user->name = $request->get('name');
        $user->save();

        return redirect()->route('home');
    }
}
