@extends('templates.template')

@section('content')
    <h1 class="text-center">Acervo</h1>
    <hr>

    

    <div class="col-8 m-auto">

    <div class="text-right">
        <a href="{{url("books/create")}}">
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
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalDetalhe<?php echo $books->id ?>">
                            Visualizar
                        </button>

                        <!-- Modal visualizar detalhes -->
                        <div class="modal fade" id="modalDetalhe<?php echo $books->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$books->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left text-info">
                                    Registro: {{$books->id}}<br>
                                    Título: {{$books->title}}<br>
                                    Autor: {{$user->name}}<br>
                                    Ano: {{$books->year}}<br>
                                    Páginas: {{$books->pages}}<br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- Botão de editar -->
                        <a href="{{url("books/$books->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusao<?php echo $books->id ?>">
                            Deletar
                        </button>

                        <!-- Modal exclusão -->
                        <div class="modal fade" id="modalExclusao<?php echo $books->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Exclusão de título</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center text-info">
                                <p>Deseja realmente excluir o seguinte título?</p><br>
                                <strong>{{$books->title}}</strong><br>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

                                <!-- Form que possibilita exclusão -->
                                <form action="{{url("books/destroy/$books->id")}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#">
                                        <button type="submit" class="btn btn-danger">Sim</button>
                                    </a>
                                </form>
                                
                            </div>
                            </div>
                        </div>
                        </div>
                        
                    </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        
    </div>
@endsection