<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Review;
use App\Models\Address;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Notification;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'phone_number',
        'role_id'
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
        'password' => 'hashed',
    ];

    public function UsersReviews(){
        return $this->hasMany(Review::class, 'user_id');
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function addresses(){
        return $this->hasMany(Address::class);
    }
    public function notifications(){
        return $this->hasMany(Notification::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }
    public function foundItems(){
        return $this->hasMany(FoundItem::class);
    }

    public function isAdmin(){
        return $this->role->name == 'admin';
    }
}
