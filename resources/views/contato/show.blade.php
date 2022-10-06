@extends('layout.app')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <h1>Contato - {{$contato->nome}}</h1>
    <ul>
        <li>ID: {{$contato->id}}</li>
        <li>e-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a></li>
        <li>Telefone: {{$contato->telefone}}</li>
        <li>Cidade: {{$contato->cidade}}</li>
        <li>Estado: {{$contato->estado}}</li>
    </ul>
    <a href="{{url('contatos')}}">Voltar</a>
@endsection