<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\User;

class AppAccount extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $sidebar = Sidebar::all();
        return view('backend.account', [
            'user' => $user,
            'sidebar' => $sidebar
        ]);
    }

    public function save(Request $request)
    {

        $user = $request->user();

        // Save Vehicle
        $user = User::find($user->id);

        $user->fill($request->all());
        $user->save();

        return redirect()->back();
    }
}
