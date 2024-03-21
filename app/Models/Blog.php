<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'image', 'description'];

    public function category(){
        return $this->belongsToMany(Category::class, 'blog_category');
    }
}
