@extends('layout.app')
@section('title','Empréstimo - '.$emprestimo->id)
@section('content')
    <div class="card w-50">
        <div class="card-header">
            <h1>Empréstimo - {{$emprestimo->id}}</h1>
            @if(Session::has('mensagem'))
            <div class="alert alert-info">
                {{Session::get('mensagem')}}
            </div>
        @endif
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">ID: {{$emprestimo->id}}</h3>
                    </div>
                    <div class="col-4">
                        @if($emprestimo->datadevolucao == null)
                            {{Form::open(['route'=>['emprestimos.devolver',$emprestimo->id],'method'=>'PUT'])}}
                            {{form::submit('Devolver',['class'=>'btn btn-success','onclick'=>'return confim("Confirma devolução?")'])}}
                            {{Form::close()}}
                        @endif
                    </div>
                </div>
            </div>
            Data:
            {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}<br/> Devolução: {!!$emprestimo->devolvido!!}
            <br/>
            Contato: {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}<br/>
            Livro: {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}<br/>
            <p class="text">obs: {{$emprestimo->obs}}</p>
        </div>
        <div class="card-footer">
            {{Form::open(['route' => ['emprestimos.destroy',$emprestimo->id],'method' => 'DELETE'])}}
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('emprestimos/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection
