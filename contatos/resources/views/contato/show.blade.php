@extends('layout.app')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Contato - {{$contato->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$contato->id}}</h3>
                <p class="text">e-mail: <a href="mailto:{{$contato->email}}">{{$contato->email}}</a><br/>
                Telefone: {{$contato->telefone}}<br/>
                Cidade: {{$contato->cidade}}<br/>
                Estado: {{$contato->estado}}</p>
        </div>
        <div class="card-footer">
            {{Form::open(['route' => ['contatos.destroy',$contato->id],'method' => 'DELETE'])}}
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('contatos/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection