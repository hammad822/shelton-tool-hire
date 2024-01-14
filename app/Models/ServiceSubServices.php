<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubServices extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->hasMany(ToolReview::class,'service_sub_service_id','id');
    }
}
