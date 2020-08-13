@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book)) Editar @else Novo título @endif</h1>
    <hr>

    <div class="col-8 m-auto">

    
        @if(isset($errors) && count($errors) > 0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif
    

    <div class="text-left">
        <a href="{{url("books")}}">
            <button class="btn btn-success mb-3">Voltar</button>
        </a>
    </div>

    @if(isset($book))
        <form name="formEdit" id="formEdit" method="post" action="{{url("books/$book->id")}}">
            @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" action="{{url("books")}}">
    @endif
            @csrf
            <input class="form-control mb-2" type="text" name="title" id="title" placeholder="Título" value="{{$book->title ?? ''}}" required>

            <select class="form-control mb-2" name="id_user" id="id_user" required>
                <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <input class="form-control mb-2" type="text" name="year" id="year" placeholder="Ano" value="{{$book->year ?? ''}}">
            <input class="form-control mb-2" type="text" name="pages" id="pages" placeholder="Nº de páginas" value="{{$book->pages ?? ''}}">
            <input class="btn btn-primary" type="submit" value="@if(isset($book)) Salvar alterações @else Cadastrar @endif">
        </form>
    </div>
@endsection