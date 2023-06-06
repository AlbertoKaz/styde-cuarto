<tr>
    <td rowspan="1">{{ $user->id }}</td>
    <th scope="row">
        {{ $user->first_name }} {{ $user->last_name }}
    </th>
    <td>{{ $user->team->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>
    <td>
        <span class="note">Registro: {{ $user->created_at->format('d/m/Y') }}</span>
        <span class="note">Último login: {{ $user->created_at->format('d/m/Y') }}</span>
    </td>
    <td class="text-right">
        @if ($user->trashed())
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link"><span class="oi oi-circle-x"></span></button>
            </form>
        @else
            <form action="{{ route('users.trash', $user) }}" method="post">
                @csrf
                @method('PATCH')
                <a href="{{ route('users.show', $user) }}" class="btn btn-link"><i class="bi bi-eye"></i></a>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><i class="bi bi-pencil-fill"></i></a>
                <button type="submit" class="btn btn-link"><i class="bi bi-trash"></i></button>
            </form>
        @endif
    </td>
</tr>
<tr class="skills">
    <td colspan="1"><span class="note">{{ $user->profile->profession->title }}</span></td>
    <td colspan="4"><span class="note">{{ $user->skills->implode('name', ', ') ?: 'Sin habilidades' }}</span></td>
</tr>
