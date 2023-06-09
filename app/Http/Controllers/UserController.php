<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Skill;
use App\Models\User;
use App\Http\Forms\UserForm;
use App\Sortable;
use App\UserFilter;
use App\Http\Requests\{CreateUserRequest, UpdateUserRequest};
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request, UserFilter $filters, Sortable $sortable)
    {
        $users = User::query()
            ->when($request->routeIs('users.trashed'), function ($q) {
                $q->onlyTrashed();
            })
            ->with('team', 'skills', 'profile.profession')
            ->filterBy($filters, $request->only(['state', 'role', 'search', 'skills', 'from', 'to']))
            ->when(request('order'), function ($q) {
                $q->orderBy(request('order'), request('direction', 'asc'));
            }, function ($q) {
                $q->orderByDesc('created_at');
            })
            ->paginate(10);

        $users->appends($filters->valid());
        $sortable->setCurrentOrder(request('order'), request('direction'));

        return view('users.index', [
            'view' => $request->routeIs('users.trashed') ? 'trash' : 'index',
            'users' => $users,
            'skills' => Skill::orderBy('name')->get(),
            'checkedSkills' => collect(request('skills')),
            'sortable' => $sortable,
        ]);
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->paginate();

        return view('users.index', [
            'users' => $users,
            'view' => 'trash',
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return new UserForm('users.create', new User);
    }

    public function store(CreateUserRequest $request)
    {
        $request->CreateUser();
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return $this->form('users.edit', $user);
    }

    protected function form($view, User $user)
    {
        return view($view, [
            'professions' => Profession::orderBy('title', 'ASC')->get(),
            'skills' => Skill::orderBy('name', 'ASC')->get(),
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->updateUser($user);
        return redirect()->route('users.show', ['user' => $user]);
    }

    public function trash(User $user)
    {
        $user->delete();
        $user->profile()->delete();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();
        $user->forceDelete();
        return redirect()->route('users.trashed');
    }
}
