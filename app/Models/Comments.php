<?php

namespace App\Models;
use App\Models\Posts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'parent_id',
        'users_id',
        'posts_id',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
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
