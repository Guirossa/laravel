@extends('layout.app')
@section('title','Listagem de Livros')
@section('content')
    <h1>Listagem de Livros</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'livros/buscar','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-3">
                <a class="btn btn-success" href="{{url('livros/create')}}">Criar</a>
            </div>
            <div class="col-sm-9">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('livros/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <br />
    <table class="table table-striped">
        @foreach ($livros as $livro)
            <tr>
                <td>
                    <a href="{{url('livros/'.$livro->id)}}">{{$livro->titulo}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $livros->links() }}
@endsection
