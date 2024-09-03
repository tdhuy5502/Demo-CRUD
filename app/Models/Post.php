<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'name',
        'description',
        'category',
        'user_id'
    ];

    public function images()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
    