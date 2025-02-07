<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Anime2 extends Model
{
    use SoftDeletes;
    public  $someProperty;
    protected $guarded = [];
    
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id', 'id');
    }


} 
