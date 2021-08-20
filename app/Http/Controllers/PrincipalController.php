<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //o framework sabe através do metodo view, que estou chamando a pasta resources/views então
        //devo indicar apenas o diretório que no caso é site, com um . dizendo que dentro do diretório
        //quero a view principal, o .blade.php deve ser omitido pois o framework sabe que é aquele arquivo
        //de view html que quero utilizar
        return view('site.principal');
    }
}
