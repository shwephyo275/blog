<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name'];
    public function Blog(){
        return $this->belongsToMany(Blog::class, 'blog_category');
    }
}
