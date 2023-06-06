<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
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

    public static function findByEmail($email)
    {
        return static::where(compact('email'))->first();
    }

    public function team() // Relación: Un usuario pertenece a un equipo
    {
        return $this->belongsTo(Team::class)->withDefault();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skill');
    }

    public function profile() // Relación 2 Un usuario tiene un perfil
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'team' => $this->team->name,
        ];
    }

    /*
    public function scopeSearch($query, $search) // Recibe como argumento una consulta
    {
        if (empty($search)) {
            return;
        }
        // Opción 1 Búsqueda Parcial Nombre y Apellido
        //$query->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like',  "%$search%")

        //Opción 2 Búsqueda Parcial Nombre y Apellido
        $query->whereRaw('CONCAT(first_name, " ", last_name) like ?',  "%$search%")
                ->orWhere('email', 'like', "%$search%") // Búsqueda parcial email :)
                ->orWhereHas('team', function ($query) use ($search) { // Búsqueda parcial de Empresas
                    $query->where('name', 'like', "%$search%");
                });
    }
    */

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
