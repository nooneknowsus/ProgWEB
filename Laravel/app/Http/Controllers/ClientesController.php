<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // vai exibir a tabela com todos os clientes
        // tem que usar método GET

        $clientes = Clientes::all();
        return view("cliente.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // vou mostrar o formulário de cadastro do cliente
        return view('cliente.create'); // nome da pasta . nome do arquivo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // salvar os dados na tabela Clientes
        // tem que usar o método post

        // $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'telefone' => 'required|string|max:15',
        //     'idade' => 'required|integer|min:0',
        // ]);

        Clientes::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'idade' => $request->input('idade')
        ]);

        // dar uma olhadinha no tutorial que a prof disponibilizou
        // lá vai ter conteúdos sobre validação de dados - campos vazios, etc
        return redirect()->route('clientes.index')->with('success', 'Registro inserido com sucesso!');
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

        $cliente = Clientes::findOrFail($id); // método tenta encontrar o registro pelo ID
        // retorna todos os dados na variável cliente
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // salvar as alterações em um registro
        // método PUT

        $cliente = Clientes::findOrFail($id);
        $cliente->update([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'idade' => $request->input('idade')
        ]);


        return redirect()->route('clientes.index')->with('success', 'Registro alterado com sucesso!');
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
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Registro excluído com sucesso!');
    }

    public function delete(string $id) {
        // método get
        // mostrar formulário com os dados antes de excluir
        $cliente = Clientes::findOrFail($id); // método tenta encontrar o registro pelo ID
        // retorna todos os dados na variável cliente
        return view('cliente.delete', compact('cliente'));
    }
}
