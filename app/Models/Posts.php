<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'title',
        'description',
        'data',
        'contents',
        'user_id',
        'category_id',
    ];

    public function comments()
    {
        // Указываем, что у поста может быть много комментариев
        return $this->hasMany(Comments::class);
    }

    public function category()
    {
        // Указываем, что категория принадлежит посту
        return $this->belongsTo(CategoryPosts::class, 'category_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
