@extends('layout.app')
@section('title','Realizar Emprestimo')
@section('content')
    <h1>Realizar Empréstimo</h1>
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
    <br />
    {{Form::open(['route' => 'emprestimos.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('contato_id', 'Contato')}}
        {{Form::text('contato_id','',['class'=>'form-control','required','placeholder'=>'Selecione um Contato','list'=>'listcontatos'])}}
        <datalist id='listcontatos'>
            @foreach($contatos as $contato)
                <option value="{{$contato->id}}">{{$contato->nome}}</option>
            @endforeach
        </datalist>

        {{Form::label('livro_id', 'Livro')}}
        {{Form::text('livro_id','',['class'=>'form-control','required','placeholder'=>'Selecione um Livro','list'=>'listlivros'])}}
        <datalist id="listlivros">
            @foreach($livros as $livro)
                <option value="{{$livro->id}}">{{$livro->titulo}}</option>
            @endforeach
        </datalist>

        {{Form::label('datahora', 'Data')}}
        {{Form::text('datahora',\Carbon\Carbon::now()->format('d/m/Y H:i:s'),['class'=>'form-control','required','placeholder'=>'Data','rows'=>'8'])}}
        {{Form::label('obs', 'Obs')}}
        {{Form::textarea('obs','',['class'=>'form-control','placeholder'=>'Observação'])}}
        <br/>
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection
