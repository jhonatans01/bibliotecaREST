@extends('app')

@section('content')
    <h1>Gênero</h1>

    <table class="table">
        @foreach ($generos as $genero)
            <tr>
                <td>{{$genero->id}}</td>
                <td>{{$genero->titulo}}</td>
            </tr>
        @endforeach
    </table>
@stop
