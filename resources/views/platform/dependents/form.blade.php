@extends('layouts.default')

@section('content')

<div id="listaPessoas">
	<h1>Dependentes</h1>
    
    <div id="infoDep">

        <div id="fotoCadastro">
            {{-- <img src="{!! asset('images/fotoCadastro.png') !!}" width="77" height="77" /> --}}
            <img src="{{ 'data:'.$person->type.';base64,'.$person->foto_base64 }}" width="77" height="77" />
        </div> 
        
        <table id="tListaCad" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="tituloTab">Nome</td>    
                <td>{{ $person->nome }}</td>    
            </tr>              
            <tr bgcolor="#cddeeb">
                <td class="tituloTab">Data de Nascimento</td>    
                <td>{{ $person->data_nascimento }}</td>    
            </tr>              
            <tr>
                <td class="tituloTab">Email</td>    
                <td>{{ $person->email }}</td>    
            </tr>              
        </table>
        
        <form id="frmAdicionaDep" method="POST" action="{{ route('people.dependents.store', [$person->id]) }}">

            {{ csrf_field() }}
            <input type="hidden" name="pessoa_id" value="{{ $person->id }}">

            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <br>
                </div>
            @endif

            <div class="agrupa mB mR">
                <label for="cNomeDep">Nome</label><br />
                <input type="text" name="nome" id="cNomeDep" />
            </div>
            <div class="agrupa">
                <label for="cDataNasc">Data de Nascimento</label><br />
                <input type="text" name="data_nascimento" id="cDataNasc" />
            </div>                            

            <a href="javascript:;" class="btPadrao addDependent">Adicionar</a>

        </form>
        
        
        <table id="tLista" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th width="60%" class="tL">Nome do Dependente</th>
                <th width="33%">Data de Nascimento</th>
                <th></th>
            </tr>

            @foreach($person->dependents as $dependent)
            <tr>
                <td>{{ $dependent->nome }}</td>
                <td align="center">{{ $dependent->data_nascimento }}</td>
                <td align="center"><a href="{{ route('people.dependents.delete', [$person->id, $dependent->id]) }}" class="btRemover"></a></td>
            </tr>
            @endforeach
        </table>
        
        {{-- <a href="javascript:;" class="btPadrao mT">Salvar</a> --}}
    </div>
    
</div>

@endsection


@section('scripts')
    @parent

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('.addDependent').on('click', function(e){
                e.preventDefault();

                $('#frmAdicionaDep').submit();

            });

            $('.btRemover').on('click', function(e){
                if (confirm("Deseja remover o dependente selecionado?") == true) {
                    return true;
                } else {
                    return false;
                }
            });

        });
    </script>

@endsection