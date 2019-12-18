<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SobreController extends Controller
{
    public function index()
    {
    	return view('course.sobre.index');
    }
}
