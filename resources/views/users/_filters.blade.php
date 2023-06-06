<form method="get" action="{{ url('usuarios') }}">

    <div class="row row-filters mb-3">
        <div class="col-12">
            @foreach (['' => 'Todos', 'with_team' => 'Con equipo', 'without_team' => 'Sin equipo'] as $value => $text)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="team"
                           id="team_{{ $value ?: 'all' }}" value="{{ $value }}" {{ $value == request('team') ? 'checked' : '' }}>
                    <label class="form-check-label" for="team_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row row-filters">
        <div class="col-md-12">
            <div class="form-inline form-search mb-3">
                <div class="input-group d-flex">
                    <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}" placeholder="Buscar" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </div>

            {{--
            <div class="col-md-6 mb-3">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    Rol
                </button>
                <ul class="dropdown-menu">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Todos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Usuario
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Admin
                        </label>
                    </div>
                </ul> --}}

                {{--
                <div class="btn-group drop-skills">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Habilidades
                    </button>
                    <div class="dropdown-menu skills-list">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="skill1">
                            <label class="form-check-label" for="skill1">CSS</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="skill2">
                            <label class="form-check-label" for="skill2">Laravel</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="skill3">
                            <label class="form-check-label" for="skill3">Front End</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="skill4">
                            <label class="form-check-label" for="skill4">Bases de Datos</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="skill5">
                            <label class="form-check-label" for="skill5">Javascript</label>
                        </div>
                    </div>
                </div> --}}

                {{--
                <div class="col-md-12 text-right mb-3">
                    <div class="form-inline form-dates">
                        <label for="date_start" class="form-label-sm">Fecha</label>&nbsp;
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="date_start" id="date_start" placeholder="Desde">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-calendar-event"></i></button>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="date_start" id="date_start" placeholder="Hasta">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-calendar-event-fill"></i></button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</form>
