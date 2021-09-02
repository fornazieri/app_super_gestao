<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return 'Olá, seja bem vindo ao curso!';
// });

//se no callback for passado uma string, o laravel sabe que estou passando um controller
//então a sintaxe deve ficar Controller@metodo ou Controller@action que é a mesma coisa
//neste caso, estou pedindo para executar o metodo principal dentro do controller PrincipalController
//Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']); //na versão 8
Route::get('/', 'PrincipalController@principal')->name('site.index'); //na versão 7.0.0
//-> name faz com que a rota tenha um nome, assiim quando eu linkar num botão, usando {{ route(rota.nome) }}
//eu não perca a ligação caso o nome do end-point mude


Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function(){ return 'Login'; })->name('site.login');

//prefix serve no route para agrupar rodas, ou seja, clientes, fornecedores e produtos estão agrupados
//em app, e devem ser chamados no navegador com app/clientes...
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

//REDIRECIONAMENTO
/*Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1'); //utilizando redirect para redirecionar rota, ou seja, caiu na rota2 redireciona para rota1
*/

//fallback serve para mostrar algo quando a rota acessada não existe, assim como um 404 page not found
Route::fallback(function() {
    echo 'A rota acessada não existe. clique <a href="'.route('site.index').'">aqui</a> para ir para a página inicial';
});

// Route::get(
//     '/contato/{nome}/{categoria_id}', 
//     function(
//         string $nome = 'Desconhecido', 
//         int $categoria_id = 1 // 1- Informação
//     ){
//         echo "Estamos aqui: $nome - $categoria_id";
//     }
// )->where('categoria_id', '[0-9]+')//tratativa para que o categoria id seja apenas numeros e o + indica que seja informado ao menos um valor
// ->where('nome', '[A-Za-z]+');//tratativa para que o nome seja informado (+) e que seja string, de A - Z ou a - z



/* principais verbos http
exemplo: //Route::get($uri, $callback);
get
post
put
patch
delete
options

*/