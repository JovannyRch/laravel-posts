
    @include('dashboard.partials.validation-error')
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            placeholder="Escribe el nombre"
            value="{{old('name',$user->name)}}"
        />
        @error('title')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>
    <div class="form-group">
        <label for="surname">Apellidos</label>
        <input
            type="text"
            class="form-control"
            name="surname"
            id="surname"
            placeholder="Escribe los apellidos"
            value="{{old('surname',$user->surname)}}"
        />
        @error('title')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="Escribe el correo"
            value="{{old('email',$user->email)}}"
        />
        @error('title')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input
            type="text"
            class="form-control"
            name="password"
            id="password"
            placeholder="Escribe la contraseña"
            value="{{old('password',$user->password)}}"
        />
        @error('title')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>


