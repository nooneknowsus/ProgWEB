<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professores;

class ProfessoresController extends Controller
{
    public function index()
    {
        $professores = Professores::all();
        return view("professores.index", compact('professores'));
    }

    public function create()
    {
        // Mostra o formulário de cadastro dos professores
        return view('professores.create');
    }

    public function store(Request $request)
    {
        Professores::create([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);
        return redirect()->route('professores.index')->with('success', 'Registro inserido com sucesso!');
    }
    public function show(string $id)
    {
        // mostra um único registro
    }

    public function edit(string $id)
    {
        $professores = Professores::findOrFail($id);
        return view('professores.edit', compact('professores'));
    }

    public function update(Request $request, string $id)
    {
        $professores = Professores::findOrFail($id);
        $professores->update([
            'nome' => $request->input('nome'),
            'curso' => $request->input('curso'),
            'idade' => $request->input('idade')
        ]);

        return redirect()->route('professores.index')->with('success', 'Registro alterado!');
    }

    public function destroy(string $id)
    {
        $professores = Professores::findOrFail($id);
        $professores->delete();
        return redirect()->route('professores.index')->with('success', 'Registro excluído!');
    }

    public function delete(string $id)
    {
        $professores = Professores::findOrFail($id);
        return view('professores.delete', compact('professores'));
    }
}
