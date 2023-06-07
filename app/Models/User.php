<?php

namespace App\Models;

use App\UserQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use Searchable;

    /* The attributes that are mass assignable. */
    protected $guarded = [];

    /* The attributes that should be hidden for serialization. */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* The attributes that should be cast. */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean'
    ];

    public function newEloquentBuilder($query)
    {
        return new UserQuery($query);
    }

    public function team()
    {
        return $this->belongsTo(Team::class)->withDefault();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skill');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function setStateAttribute($value) //Setter dinámico
    {
        $this->attributes['active'] = $value == 'active';
    }

    public function getStateAttribute() //Getter dinámico
    {
        return $this->active ? 'active' : 'inactive';
    }

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
