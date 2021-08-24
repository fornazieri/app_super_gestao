<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2){
        //echo "A soma de $p1 + $p2 é: ".($p1+$p2);  
        //Formas de passar parametros para a View
        //return view('site.teste', ['p1' => $p1, 'p2' => $p2]);   //Array assiciativo

        //mais utilizado
        return view('site.teste', compact('p1', 'p2'));   //Compact (nome da variavel sem o $, ai do lado da view o nome é o mesmo utilizadno $)

        //return view('site.teste')->with('p1', $p1)->with('p2', $p2); //With, com o with ->with('p1', $p1) o primeiro parametro é o nome da variavel do lado da view, o segundo, a variavel / o valor
    }
}
