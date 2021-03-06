<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

use App\user;

class AppLanguage extends Controller
{
    public function index()
    {
        $sidebar = Sidebar::all();
        return view('backend.language', [
            'sidebar' => $sidebar
        ]);
    }

    public function save(Request $request)
    {

        $user = $request->user();

        // Save Vehicle
        $user = User::find($user->id);
        $user->password = bcrypt($request['pass']);
        $user->save();

        return redirect()->back();
    }
}
