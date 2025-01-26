<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime2;
use App\Models\Anime;

class ContactController extends Controller
{
    public function index(){
      $posts = Anime2::all();
       return view('contact');
      }
}

