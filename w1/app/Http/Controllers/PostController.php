<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime2;
use App\Models\Anime;
class PostController extends Controller
{
    public function index2(){
      $posts = Anime2::all();
       return view('home' , compact('posts'));
      }
    public function create(){
      $Anime2Arr = [
        [
          'студия' =>'666',
          'название' =>'борутыч',
          'количество серий' =>155,
          'количество сезонов' =>90,
          'оценка'=>5,
          'дирьМо'=>1,
          'норм тайтл'=>13,
          
        ],
        [
          'студия' =>'another хентай',
          'название' =>'another 3любите меня сестрички',
          'количество серий' =>3,
          'количество сезонов' =>1,
          'оценка'=>10,
          'дирьМо'=>0,
          'норм тайтл'=>1,
          
        ],
      ];
      foreach($Anime2Arr as $item){
      
        Anime2::create($item);
      }

     
    dd('created');
    }
    public function update(){
      
    }
    public function delete(){
      $Anime2 = Anime2::find(2);
      $Anime2->delete();
      dd('deleted');
    }
}

