<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AovivoController extends Controller
{
    public function index()
    {
    	return view('course.aovivo.index');
    }
}
