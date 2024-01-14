<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolHiring extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
