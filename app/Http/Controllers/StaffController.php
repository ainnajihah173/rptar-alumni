<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard(){
        return view('dashboard');
      }

    public function index(){

      return view('alumni-profile');
    }

    public function show(){

      return view('alumni-details');
    }
}
