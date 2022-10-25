@extends('layout.app')
@section('title','Contato - '.$contato->nome)
@section('content')
    <div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/contatos/".md5($contato->id).".jpg")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpg";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".png")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".png";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".gif")) {
                $nomeimagem =  "./img/contatos/".md5($contato->id).".gif";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".webp")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".webp";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".jpeg")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpeg";
            } else {
                $nomeimagem = "./img/contatos/semfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$contato->nome,["class"=>"img-thumbnail"])}}

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
            @if ($nomeimagem !== "./img/contatos/semfoto.webp")
               {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('contatos/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
    <br />
    <div class="card w-70 m-auto">
        <div class="card-header">
            <h1>Empréstimos</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Id</th>
                    <th>Livro</th>
                    <th>Data</th>
                    <th>Devolução</th>
                </tr>
                @foreach ($contato->emprestimos as $emprestimo)
                        <tr>
                            <td>
                                <a href="{{url('emprestimos/'.$emprestimo->id)}}">{{$emprestimo->id}}</a>
                            </td>
                            <td>
                                {{$emprestimo->livro_id}} - {{$emprestimo->livro->titulo}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}
                            </td>
                            <td>{!!$emprestimo->devolvido!!}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
@endsection
