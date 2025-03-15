<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    protected $fillable = [
        'name',
        'url',
        'parent_id',
        'is_visible',
    ];

    public function allPosts()
    {
        return $this->hasMany(Posts::class);
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
