<h3>Fornecedor</h3>

{{-- Um comentário na sintaxe blade, que será ignorado pelo interpretador do Blade 

{{ 'Texto de teste com abre fecha chaves, sinonimo simples' }}
</br>

<?= "Texto de teste com a tag curta de impressão do php" ?>
</br>

@php
    //comentário com a sintaxe nativa do php
    echo 'Texto de teste na impressão dentro do bloco de php puro na view';
@endphp
--}}

@php
    /* Sintaxe do if em php
    if(){
    }elseif(){
    }else{
    };*/

    /* Sintaxe do if em php com negação, ele executa se o retorno for true e o @unless se o retorno for false
    if(!condicao){};*/

    /*isset serve para verificar se uma variavel foi setada, se ela existe
    if(isset($variavel))*/

    /*empty serve para verificar se a variavel está vazia, ou seja, nestas situações
    ''
    0
    0.0
    '0'
    null
    false
    array()
    $var
    if(empty($variavel))*/
@endphp

{{-- Maneira de imprimir array em blade --}}
{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)    
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

{{-- @unless executa se o retorno for false --}}

Fornecedor 1: {{ $fornecedoresMultiDimensional[0]['nome'] }}
</br>
Status 1: {{ $fornecedoresMultiDimensional[0]['status'] }}
</br>
@if($fornecedoresMultiDimensional[0]['status'] == 'N')
    Fornecedor inativo testando status N
@endif
</br>
@if(!($fornecedoresMultiDimensional[0]['status'] == 'S'))
    Fornecedor inativo negando status S
@endif
</br></br>

Fornecedor 2: {{ $fornecedoresMultiDimensional[1]['nome'] }}
</br>
Status 2: {{ $fornecedoresMultiDimensional[1]['status'] }}
</br>
@unless($fornecedoresMultiDimensional[0]['status'] == 'S') <!-- se o retorno da condição for false, ele executa sem precisar negar com !-->
    Fornecedor inativo utilizando unless, sem precisar negar a condição
@endunless
</br>
</br>

{{-- idxTesteFornecedor como indice de testes para imprimir usando isset como validação --}}
@php $idxTesteFornecedor = 2; @endphp
@isset($fornecedoresMultiDimensional)
    Fornecedor: {{ $fornecedoresMultiDimensional[$idxTesteFornecedor]['nome'] }}</br>
    Status: {{ $fornecedoresMultiDimensional[$idxTesteFornecedor]['status'] }}</br>
    {{-- @isset($fornecedoresMultiDimensional[$idxTesteFornecedor]['cnpj'])
        CNPJ: {{ $fornecedoresMultiDimensional[$idxTesteFornecedor]['cnpj'] }}
        @empty($fornecedoresMultiDimensional[$idxTesteFornecedor]['cnpj'])
            - Vazio
        @endempty
        </br>
    @endisset --}}

    CNPJ: {{ $fornecedoresMultiDimensional[$idxTesteFornecedor]['cnpj'] ?? 'Dado não informado' }}
    <!--
        com o operador ?? do blade
        $variavel testada não estiver definida (isset)
        ou
        $variavel testada possuir o valor null (não vazio, NULL)
    -->
@endisset