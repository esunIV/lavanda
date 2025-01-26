<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime2;
use App\Models\Anime;

class HomeController extends Controller
{
  public function index(){
    $posts = Anime2::all();
      return view('home.index', compact('posts'));
  }
  public function create(){
    return view('home.create');
  }
  public function store(){
    $data = request()->validate([
      'название'=>'string',
      'студия'=>'string',
      'оценка'=>'string',
    ]);
    Anime2::create($data);
      return redirect()->route('home.index');
  }
  public function show(Anime2 $post){
    return view('home.show', compact('post'));
  }
  public function edit(Anime2 $post){
    return view('home.edit', compact('post'));
  }
  public function update(Anime2 $post){
    $data = request()->validate([
      'название'=>'string',
      'студия'=>'string',
      'оценка'=>'string',
    ]);
    $post->update($data);
      return redirect()->route('home.show',$post->id);
  }
  public function destroy(Anime2 $post){
    $post->delete();
    return redirect()->route('home.index',);
  }
}


