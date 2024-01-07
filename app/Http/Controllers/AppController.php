<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AppController extends Controller
{
    public function home() : View {
        /*User::create([
            'name' => 'Vincent',
            'email' => 'lefebvre-v@laposte.net',
            'password' => Hash::make('vincent76')
        ]);*/
        return view('home');
    }
}
