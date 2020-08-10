@extends('templates.template')

@section('content')
    <h1 class="text-center">Acervo</h1>
    <hr>

    

    <div class="col-8 m-auto">

    <div class="text-right">
        <a href="">
            <button class="btn btn-success mb-3">Novo título</button>
        </a>
    </div>

        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Registro</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Ano</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book as $books)
                    
                    @php
                        $user = $books->find($books->id)->relUsers;
                    @endphp

                    <tr>
                    <th scope="row">{{$books->id}}</th>
                    <td>{{$books->title}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$books->year}}</td>
                    <td>
                        <a href="">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection