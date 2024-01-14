<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isModerator()
    {
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }

    public function isOwner()
    {
        if ($this->role_id == 2) {
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if ($this->role_id == 3) {
            return true;
        }
        return false;
    }

    public function likedTools()
    {
        return $this->hasMany(ToolLike::class,'user_id','id');
    }

    public function reviewedTools()
    {
        return $this->hasMany(ToolReview::class,'user_id','id');
    }

    public function hiredTools()
    {
        return $this->hasMany(ToolHiring::class,'user_id','id');
    }
}
