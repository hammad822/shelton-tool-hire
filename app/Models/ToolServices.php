<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolServices extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subServices()
    {
        return $this->hasMany(ServiceSubServices::class,'service_id','id');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class,'tool_id','id');
    }
}
