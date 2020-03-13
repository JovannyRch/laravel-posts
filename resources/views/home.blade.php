<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hola a todos</h2>
    hola {{$nombre}}
    {{$apellido}}
    <ul>
    @forelse ($publicaciones as $p)
    @if ($loop->first)
        Primero:
    @elseif ($loop->last)
        Último:
    @else()
        Medio:
    @endif
    
    <li>{{$p}}</li>

    @empty
        <li>No hay publicaciones</li>
    @endforelse
</ul>
</body>
</html>