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
//     return 'Ol�, seja bem vindo ao curso!';
// });

//se no callback for passado uma string, o laravel sabe que estou passando um controller
//ent�o a sintaxe deve ficar Controller@metodo ou Controller@action que � a mesma coisa
//neste caso, estou pedindo para executar o metodo principal dentro do controller PrincipalController
Route::get('/', 'PrincipalController@principal'); //na vers�o 7.0.0
//Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']); //na vers�o 8

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');



/* principais verbos http
exemplo: //Route::get($uri, $callback);
get
post
put
patch
delete
options

*/