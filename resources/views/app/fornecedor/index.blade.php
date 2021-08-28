<h3>Fornecedor</h3>

{{-- Um coment�rio na sintaxe blade, que ser� ignorado pelo interpretador do Blade 

{{ 'Texto de teste com abre fecha chaves, sinonimo simples' }}
</br>

<?= "Texto de teste com a tag curta de impress�o do php" ?>
</br>

@php
    //coment�rio com a sintaxe nativa do php
    echo 'Texto de teste na impress�o dentro do bloco de php puro na view';
@endphp
--}}

@php
    /* Sintaxe do if em php
    if(){
    }elseif(){
    }else{
    };*/

    /* Sintaxe do if em php com nega��o, ele executa se o retorno for true e o @unless se o retorno for false
    if(!condicao){};*/

    /*isset serve para verificar se uma variavel foi setada, se ela existe
    if(isset($variavel))*/

    /*empty serve para verificar se a variavel est� vazia, ou seja, nestas situa��es
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
    <h3>Existem v�rios fornecedores cadastrados</h3>
@else
    <h3>Ainda n�o existem fornecedores cadastrados</h3>
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
@unless($fornecedoresMultiDimensional[0]['status'] == 'S') <!-- se o retorno da condi��o for false, ele executa sem precisar negar com !-->
    Fornecedor inativo utilizando unless, sem precisar negar a condi��o
@endunless
</br>
</br>

@isset($fornecedoresMultiDimensional)
    <h3>Imprimindo com FOR</h3></br>
    @for($i = 0; isset($fornecedoresMultiDimensional[$i]); $i++)
        Fornecedor: {{ $fornecedoresMultiDimensional[$i]['nome'] }}</br>
        Status: {{ $fornecedoresMultiDimensional[$i]['status'] }}</br>
        {{-- @isset($fornecedoresMultiDimensional[$i]['cnpj'])
            CNPJ: {{ $fornecedoresMultiDimensional[$i]['cnpj'] }}
            @empty($fornecedoresMultiDimensional[$i]['cnpj'])
                - Vazio
            @endempty
            </br>
        @endisset --}}

        CNPJ: {{ $fornecedoresMultiDimensional[$i]['cnpj'] ?? 'Dado n�o informado' }}
        </br>
        <!--
            com o operador ?? do blade
            $variavel testada n�o estiver definida (isset)
            ou
            $variavel testada possuir o valor null (n�o vazio, NULL)
        -->

        Telefone: ({{ $fornecedoresMultiDimensional[$i]['ddd'] ?? '' }}) {{ $fornecedoresMultiDimensional[$i]['telefone'] ?? '' }}
        </br>

        @switch($fornecedoresMultiDimensional[$i]['ddd'])
            @case('11')
                S�o Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('18')
                Bilac - SP
                @break
            @default
                Estado n�o identificado
        @endswitch
        <hr></br>
    @endfor

    <h3>Imprimindo com While</h3></br>
    @php $i = 0; @endphp
    @while (isset($fornecedoresMultiDimensional[$i]))
        Fornecedor: {{ $fornecedoresMultiDimensional[$i]['nome'] }}</br>
        @php $i++; @endphp
        <hr></br>
    @endwhile

    <h3>Imprimindo com FOREACH</h3></br>
    @foreach ($fornecedoresMultiDimensional as $indice => $fornecedor)
        Itera��o atual, utilizando variavel loop: {{ $loop->iteration }}
        </br>
        Fornecedor: {{ $fornecedor['nome'] }}
        </br>
        @if($loop->first)
            Primeira itera��o do loop
            </br>
        @endif

        @if($loop->last)
            Ultima itera��o do loop
            </br>
            Total de registros: {{ $loop->count }}
        @endif
        
        <hr></br>    
    @endforeach

    <h3>Imprimindo com FORELSE</h3></br>
    @php $arrayVazioTeste = []; @endphp
    @forelse ($arrayVazioTeste as $indice => $fornecedor)
        Itera��o atual, utilizando variavel loop: {{ $loop->iteration }}
        </br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <hr></br>   
    @empty
        N�o existem fornecedores cadastrados 
        <hr></br> 
    @endforelse

    <h3>Caracter de escape no Blade � feito com um @ antes do mesmo, tal como @{{ teste }}</h3></br>
    @{{ teste }}

@endisset

