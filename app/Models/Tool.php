<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function services()
    {
        return $this->hasMany(ToolServices::class, 'tool_id', 'id');
    }


    public function comments()
    {
        return $this->hasMany(ToolComment::class, 'tool_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(ToolReview::class, 'tool_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(ToolLike::class, 'Tool_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
