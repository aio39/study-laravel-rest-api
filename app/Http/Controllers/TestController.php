<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class TestController extends Controller
{
    public function index(){
        $name="진";
        $age=23;
        return view('test.test', compact('name','age'));
    }
}
