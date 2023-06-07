<?php

namespace App\Models;

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

    public static function findByEmail($email)
    {
        return static::where(compact('email'))->first();
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

    public function scopeSearch($query, $search)
    {
        if (empty ($search)) {
            return;
        }

        $query->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhereHas('team', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
    }

    public function scopeByState($query, $state)
    {
        if ($state == 'active') {
            return $query->where('active', true);
        }

        if ($state == 'inactive') {
            return $query->where('active', false);
        }
    }

    public function scopeByRole($query, $role)
    {
        if (in_array($role, ['admin', 'user'])) {
            $query->where('role', $role);
        }
    }

    public function setStateAttribute($value) //Setter dinámico
    {
        $this->attributes['active'] = $value == 'active';
    }

    public function getStateAttribute() //Getter dinámico
    {
        return $this->active ? 'active' : 'inactive';
    }

    /*public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'team' => $this->team->name,
        ];
    }*/

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
