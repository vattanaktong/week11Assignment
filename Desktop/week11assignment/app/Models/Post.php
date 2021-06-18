<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'caption',
        'category_id',
        'author_id', 
    ];

   
    public function category(){
        $this->belongsTo(Category::class); 
    }
    public function author(){
        $this->belongs(User::class); 
    }
}
