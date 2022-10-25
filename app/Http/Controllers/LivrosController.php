<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Session;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::simplepaginate(5);
        return view('livro.index',array('livros' => $livros,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request) {
        $livros = livro::where('titulo','LIKE','%'.$request->input('busca').'%')->orwhere('descricao','LIKE','%'.$request->input('busca').'%')->orwhere('autor','LIKE','%'.$request->input('busca').'%')->orwhere('editora','LIKE','%'.$request->input('busca').'%')->simplepaginate(5);
        return view('livro.index',array('livros' => $livros,'busca'=>$request->input('busca')));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|min:3',
            'descricao' => 'required',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
        ]);
        $livro = new Livro();
        $livro->titulo = $request->input('titulo');
        $livro->descricao = $request->input('descricao');
        $livro->autor = $request->input('autor');
        $livro->editora = $request->input('editora');
        $livro->ano = $request->input('ano');
        if($livro->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($livro->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\livros'),$nomearquivo);
            }
            return redirect('livros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);
        return view('livro.show',array('livro' => $livro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);
        return view('livro.edit',array('livro' => $livro));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo' => 'required|min:3',
            'descricao' => 'required',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
        ]);
        $livro = Livro::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($livro->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\livros'),$nomearquivo);
        }
        $livro->titulo = $request->input('titulo');
        $livro->descricao = $request->input('descricao');
        $livro->autor = $request->input('autor');
        $livro->editora  = $request->input('editora');
        $livro->ano = $request->input('ano');
        if($livro->save()) {
            Session::flash('mensagem','Livro alterado com sucesso');
            return redirect('livros');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $livro = Livro::find($id);
        if (isset($request->foto)) {
           unlink($request->foto);
        }
        $livro->delete();
        Session::flash('mensagem','Livro Excluído com Sucesso');
        return redirect(url('livros/'));
    }
}
