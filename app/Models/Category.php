<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Blog::class);
    }

    // Fungsi untuk mendapatkan URL
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
