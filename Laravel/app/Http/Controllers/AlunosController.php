<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alunos;

class AlunosController extends Controller
{
    public function index()
    {
        // Exibe a tela com os alunos registrados
        // Necessário usar o método GET

        $alunos = Alunos::all();
        return view("aluno.index", compact('alunos'));
    }

    public function create()
    {
        // Mostra o formulário de cadastro dos alunos
        return view('aluno.create');
    }

    public function store(Request $request)
    {
        Alunos::create([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);
        return redirect()->route('alunos.index')->with('success', 'Registro inserido com sucesso!');
    }
    public function show(string $id)
    {
        // mostra um único registro
    }

    public function edit(string $id)
    {
        $aluno = Alunos::findOrFail($id);
        return view('aluno.edit', compact('aluno'));
    }

    public function update(Request $request, string $id)
    {
        $aluno = Alunos::findOrFail($id);
        $aluno->update([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);

        return redirect()->route('alunos.index')->with('success', 'Registro alterado!');
    }

    public function destroy(string $id)
    {
        $aluno = Alunos::findOrFail($id);
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Registro excluído!');
    }

    public function delete(string $id)
    {
        $aluno = Alunos::findOrFail($id);
        return view('aluno.delete', compact('aluno'));
    }
}
