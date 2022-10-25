@extends('layout.app')
@section('title','Alteração Contato {{$livro->titulo}}')
@section('content')
    <h1>Alteração Contato {{$livro->titulo}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['livros.update',$livro->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo',$livro->titulo,['class'=>'form-control','required','placeholder'=>'Título do Livro'])}}
        {{Form::label('descricao', 'Descrição')}}
        {{Form::textarea('descricao',$livro->descricao,['class'=>'form-control','required','placeholder'=>'Descrição','rows'=>'8'])}}
        {{Form::label('autor', 'Autor')}}
        {{Form::text('autor',$livro->autor,['class'=>'form-control','required','placeholder'=>'Autor'])}}
        {{Form::label('editora', 'Editora')}}
        {{Form::text('editora',$livro->editora,['class'=>'form-control','required','placeholder'=>'Editora'])}}
        {{Form::label('ano', 'Ano')}}
        {{Form::number('ano',$livro->ano,['class'=>'form-control','required','placeholder'=>'Ano'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection

