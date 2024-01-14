<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolComment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function replies()
    {
        return $this->hasMany(ToolComment::class,'comment_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
