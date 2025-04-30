<?php

namespace App\Models;
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
        return $this->belongsTo(Posts::class, 'posts_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
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
