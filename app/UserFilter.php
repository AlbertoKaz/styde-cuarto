<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserFilter extends QueryFilter
{
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'state' => 'in:active,inactive',
            'role' => 'in:admin,user',
            'skills' => 'array|exists:skills,id',
            'from' => 'date_format:d/m/Y',
            'to' => 'date_format:d/m/Y',
        ];
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('team', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }

    public function state($query, $state)
    {
        return $query->where('active', $state == 'active');
    }

    public function skills($query, $skills)
    {
        /* Opción 1 en filterBySkills
        $query->whereHas('skills', function ($q) use ($skills) {
            $q->whereIn('skills.id', $skills)
            ->havingRaw('COUNT(skills.id) = ?' , [count($skills)]);
        });*/
        $subquery = DB::table('user_skill AS s')
            ->selectRaw('COUNT(`s`.`id`)')
            ->whereColumn('s.user_id', 'users.id')
            ->whereIn('skill_id', $skills);

        $query->whereQuery($subquery, count($skills));
    }

    public function from($query, $date) //Aceptamos consulta y fecha
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);
        $query->whereDate ('created_at', '>=', $date);
        //Construimos consulta = Columna donde buscar, a partir de... y $fecha
    }

    public function to($query, $date)
    {
        $date = Carbon::createFromFormat('d/m/Y', $date);
        $query->whereDate ('created_at', '<=', $date);
    }
}


