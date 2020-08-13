@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <hr>

    <div class="col-8 m-auto">

    <div class="text-left">
        <a href="{{url("books")}}">
            <button class="btn btn-success mb-3">Voltar</button>
        </a>
    </div>

    @php
        $user = $book->find($book->id)->relUsers;
    @endphp

        Título: {{$book->title}}<br>
        Autor: {{$user->name}}<br>
        Ano: {{$book->year}}<br>
        Páginas: {{$book->pages}}<br>

    </div>

@endsection