@if ($errors->any())
    <div class="alert alert-danger col-sm-12">
        <h5>Por favor corrige los siguientes errores:</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
