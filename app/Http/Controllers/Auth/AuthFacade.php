<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Sidebar;

class AuthFacade extends Controller
{

    public function getSignOut() {
        Auth::logout();
        return redirect()->route('home');
        
    }
     
    public function showLoginForm()
    {
        $sidebar = Sidebar::all();
        return view('auth.login', [
             'sidebar' => $sidebar
        ]);
    }
    
    public function showRegistrationForm()
    {
        $sidebar = Sidebar::all();
        return view('auth.register', [
            'sidebar' => $sidebar
        ]);
    }
    
    public function showLinkRequestForm()
    {
        $sidebar = Sidebar::all();
        return view('auth.passwords.email', [
            'sidebar' => $sidebar
        ]);
    }
    
    public function showResetForm()
    {
        $sidebar = Sidebar::all();
        return view('auth.passwords.reset', [
            'sidebar' => $sidebar
        ]);
    }

}
