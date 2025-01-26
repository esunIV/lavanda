<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
class MyPlaceController extends Controller
{
    public function index(){
        return 'идите все отсюда нахуй!';
    }
    public function index1(){
        return '2й контроллер оптимизэшен.1';
    }
    public function index3(){
        $cars = Cars::find(1);
        dd($cars);
     }
}
