@csrf

<div class="form-group">
    <label for="name" class="form-label">Nombre:</label>
    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Alberto"
           value="{{ old('first_name', $user->first_name) }}">
</div>
<br>

<div class="form-group">
    <label for="name" class="form-label">Apellido:</label>
    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Mendoza"
           value="{{ old('last_name', $user->last_name) }}">
</div>
<br>

<div class="form-group">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com"
           value="{{ old('email', $user->email) }}">
</div>
<br>

<div class="form-group">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" name="password" id="password"
           placeholder="Mayor de 6 caracteres">
    <br>
</div>

<div class="form-group">
    <label for="bio" class="form-label">Bio:</label>
    <textarea class="form-control" name="bio" id="bio"
              placeholder="Escribe sobre ti">{{ old('bio', $user->profile->bio) }}</textarea>
</div>
<br>

<div class="form-group">
    <label for="profession_id">Profesión:</label>
    <select class="form-select" name="profession_id" id="profession_id">
        <option value="">Selecciona una profesión</option>
        "@foreach($professions as $profession)
            <option
                value="{{ $profession->id }}" {{ old('profession_id', $user->profile->profession_id) == $profession->id ? 'selected' : '' }}>
                {{ $profession->title }}
            </option>
        @endforeach
    </select>
</div>
<br>

<div class="form-group">
    <label for="twitter" class="form-label">Twitter:</label>
    <input type="text" class="form-control" name="twitter" id="twitter"
           placeholder="https://twitter.com/Stydenet"
           value="{{ old('twitter', $user->profile->twitter) }}">
</div>
<br>

<h5>Habilidades</h5>
@foreach($skills as $skill)
    <div class="form-group form-check form-check-inline">
        <input class="form-check-input"
               type="checkbox"
               name="skills[{{ $skill->id }}]"
               id="skill_{{ $skill->id }}"
               value="{{ $skill->id }}"
               {{ ($errors->any() ? old("skills.$skill->id") : $user->skills->contains($skill)) ? 'checked' : '' }}>
        <label class="form-check-label" for="skill_{{ $skill->id }}">
            {{ $skill->name }}
        </label>
    </div>
@endforeach

<h5 class="mt-3">Rol</h5>
{{-- @foreach($roles as $role => $name) --}}
    @foreach(trans('users.filters.roles') as $role => $name)
    <div class="form-group form-check form-check-inline">
        <input class="form-check-input"
               type="radio"
               name="role"
               id="role_{{ $role }}"
               value="{{ $role }}"
            {{ old('role', $user->role) == $role ? 'checked' : '' }}>
        <label class="form-check-label" for="role_{{ $role }}">
            {{ $name }}
        </label>
    </div>
@endforeach


<h5 class="mt-3">Estado</h5>

@foreach(trans('users.states') as $state => $label)
    <div class="form-check form-check-inline">
        <input class="form-check-input"
               type="radio"
               name="state"
               id="state_{{ $state }}"
               value="{{ $state }}"
            {{ old('state', $user->state) == $state ? 'checked' : '' }}>
        <label class="form-check-label" for="state_{{ $state }}">{{ $label }}</label>
    </div>
@endforeach

