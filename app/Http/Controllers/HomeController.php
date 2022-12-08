<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => "Dashboard",
            'total_user' => User::get()->count(),
            'total_warga' => Warga::get()->count(),
        );

        return view('home', $data);
    }
}
