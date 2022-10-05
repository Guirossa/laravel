2extends('layouts.app')
@section('title','listagem de contatos')
@section('content')
    <h1>Listagem de Contatos</h1>
    @foreach ($contatos as $contato)
        <li><a href="{{url('contatos/'.$contatos-id)}}">
            {{$contato->nome}}</a>
        </li>

@endsection