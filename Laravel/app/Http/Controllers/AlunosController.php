<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alunos;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // vai exibir a tabela com todos os alunos
        // tem que usar método GET

        $alunos = Alunos::all();
        return view("aluno.index", compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // vou mostrar o formulário de cadastro do aluno
        return view('aluno.create'); // nome da pasta . nome do arquivo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // salvar os dados na tabela Alunos
        // tem que usar o método post

        Alunos::create([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);

        // dar uma olhadinha no tutorial que a prof disponibilizou

        return redirect()->route('alunos.index')->with('success', 'Registro inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar apenas um registro
        // tem que usar método get
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar o formulário de edição
        // método get

        $aluno = Alunos::findOrFail($id); // método tenta encontrar o registro pelo ID
        // retorna todos os dados na variável aluno
        return view('aluno.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // salvar as alterações em um registro
        // método PUT

        $aluno = Alunos::findOrFail($id);
        $aluno->update([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);

        return redirect()->route('alunos.index')->with('success', 'Registro alterado com sucesso!');
        // dar uma olhadinha no tutorial que a prof disponibilizou
        // lá vai ter conteúdos sobre validação de dados - campos vazios, etc
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // método delete
        // excluir o registro
        $aluno = Alunos::findOrFail($id);
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Registro excluído com sucesso!');
    }

    public function delete(string $id) {
        // método get
        // mostrar formulário com os dados antes de excluir
        $aluno = Alunos::findOrFail($id); // método tenta encontrar o registro pelo ID
        // retorna todos os dados na variável aluno
        return view('aluno.delete', compact('aluno'));
    }
}
