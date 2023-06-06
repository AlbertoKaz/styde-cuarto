<?php

namespace App\Http\Forms;

use App\Models\Profession;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;

class UserForm implements Responsable
{
    private $view;
    private User $user;

    public function __construct($view, User $user)
        {
            $this->view = $view;
            $this->user = $user;
        }

    public function toResponse($request)
    {
        return view($this->view, [
            'user' => $this->user,
            'professions' => Profession::orderBy('title', 'ASC')->get(),
            'skills' => Skill::orderBy('name', 'ASC')->get(),
            'roles' => trans('users.roles'),
            ]
        );
    }
}
