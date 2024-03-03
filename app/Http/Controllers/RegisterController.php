<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerform($id)
    {
        return view('registerform', ['idregistro' => $id]);
    }
}
