<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //o framework sabe atrav�s do metodo view, que estou chamando a pasta resources/views ent�o
        //devo indicar apenas o diret�rio que no caso � site, com um . dizendo que dentro do diret�rio
        //quero a view principal, o .blade.php deve ser omitido pois o framework sabe que � aquele arquivo
        //de view html que quero utilizar
        return view('site.principal');
    }
}
