<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registration;

class SearchController extends Controller
{
    public function index(){
        return view('search.search');
    }
}
