@extends('layout.app')
@section('title','Alteração Contato {{$contato->nome}}')
@section('content')
    <h1>Alteração Contato {{$contato->nome}}</h1>
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
    {{Form::open(['route' => ['contatos.update',$contato->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome',$contato->nome,['class'=>'form-control','required','placeholder'=>'Nome completo'])}}
        {{Form::label('email', 'e-mail')}}
        {{Form::text('email',$contato->email,['class'=>'form-control','required','placeholder'=>'e-mail','pattern'=>'[\w+.]+@\w+\.\w{2,3}(?:\.\w{2})?'])}}
        {{Form::label('telefone', 'Telefone')}}
        {{Form::text('telefone',$contato->telefone,['class'=>'form-control','required','placeholder'=>'(99) 99999-9999','pattern'=>'(\([0-9]{2}\))\s([9]{1})?([0-9]{4,5})-([0-9]{4})','title'=>'Número de telefone precisa ser no formato (99) 99999-9999'])}}
        {{Form::label('cidade', 'Cidade')}}
        {{Form::text('cidade',$contato->cidade,['class'=>'form-control','required','placeholder'=>'Nome da cidade'])}}
        {{Form::label('estado', 'Estado')}}
        {{Form::text('estado',$contato->estado,['class'=>'form-control','required','placeholder'=>'Nome do estado'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('contatos')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection

