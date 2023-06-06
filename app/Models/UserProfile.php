<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function profession() //Relación: El usuario pertenece a una profesión
    {
        return $this->belongsTo(Profession::class)->withDefault([
            'title' => '(Sin profesión)'
        ]);
    }
}
