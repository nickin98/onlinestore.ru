<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = \Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update(Request $request) {
        $rules = [
            'full_name' => 'max:191|string',
            'street' => 'nullable|string|max:191',
            'house' => 'nullable|string|max:191',
            'flat' => 'nullable|string|max:191',
            'date_of_birth' => 'nullable|date',
        ];

        $this->validate($request, $rules);

        $user = \Auth::user();

        $user->full_name = $request->full_name;
        $user->street = $request->street;
        $user->house = $request->house;
        $user->flat = $request->flat;
        $user->date_of_birth = $request->date_of_birth;

        $user->save();

        return view('profile', ['user' => $user, 'success' => 'Профиль успешно изменен']);
    }
}
