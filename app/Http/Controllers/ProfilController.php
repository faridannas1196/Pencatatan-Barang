<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\ProfilModel;

class ProfilController extends Controller
{

    public function profil(){
        return view('profil');
    }
}
