<form method="get" action="{{ url('usuarios') }}">
    <div class="row row-filters">
        <div class="col-md-6">
            @foreach (trans('users.filters.states') as $value => $text)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="state"
                           id="state_{{ $value }}" value="{{ $value }}" {{ $value == request('state') ? 'checked' : '' }}>
                    <label class="form-check-label" for="state_{{ $value }}">{{ $text }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <input type="search" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Buscar...">
                &nbsp;
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rol
                    </button>
                    <ul class="dropdown-menu">
                        <select name="role" id="role" class="">
                            @foreach(trans('users.filters.roles') as $value => $text)
                                <option value="{{ $value }}"{{ request('role') == $value ? ' selected' : '' }}>{{ $text }}</option>
                            @endforeach
                        </select>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Habilidades
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($skills as $skill)
                            <li class="form-group form-check">
                                <input name="skills[]"
                                       type="checkbox"
                                       class="form-check-input"
                                       id="skill_{{ $skill->id }}"
                                       value="{{ $skill->id }}"
                                    {{ $checkedSkills->contains($skill->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-right">
            <div class="form-inline form-dates">
                <label for="from" class="form-label-sm">Fecha</label>&nbsp;
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="from" id="from" placeholder="Desde" value=" {{ request('from') }}">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="to" id="to" placeholder="Hasta" value=" {{ request('to') }}">
                </div>
                &nbsp;
                <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</form>
