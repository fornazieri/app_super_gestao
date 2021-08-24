<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = ['Fornecedor 1', 'Fornecedor 2'];

        $fornecedoresMultiDimensional = [
            0 => [ //exemplo completo
                'nome' => 'Fornecedor 1', 
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00'],
            1 => [ //exemplo isset para cnpj
                'nome' => 'Fornecedor 2', 
                'status' => 'S'],
            2 => [ //exemplo empty para cnpj
                'nome' => 'Fornecedor 3', 
                'status' => 'S',
                'cnpj' => null]
        ];

        //if ternario
        //condicao ? se verdade : se falso;
        //echo isset($fornecedoresMultiDimensional[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        return view('app.fornecedor.index', compact('fornecedores', 'fornecedoresMultiDimensional'));
    }
}
