@extends('layouts.default')


@section('content')

<div id="listaPessoas">

    @if(isset($person))
        <h1>Editando o Cadastro</h1>
    @else
        <h1>Incluindo um Novo Cadastro</h1>
    @endif

    <form id="formCadastrar" method="post" enctype="multipart/form-data" action="{{ isset($person) ? route('people.update', [$person->id]) : route('people.store') }}">

        @if ($errors->any())
            <div style="color: red;">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <br>
            </div>
        @endif

        @if(isset($person))
            <input name="_method" type="hidden" value="PUT">
        @endif


        {{ csrf_field() }}

        <label for="cNome">Nome</label><br />
        <input id="cNome" name="nome" value="{{ old('nome', isset($person->nome) ? $person->nome : '')  }}" /><br />

        <label for="cDataNasc">Data de Nascimento</label><br />
        <input id="cDataNasc" name="data_nascimento" value="{{ old('data_nascimento', isset($person->data_nascimento) ? $person->data_nascimento : '')  }}" /><br />

        <label for="cEmail">E-Mail</label><br />
        <input id="cEmail" name="email" value="{{ old('email', isset($person->email) ? $person->email : '')  }}" /><br />
		
        <label for="cFoto">Foto</label><br />
        <input id="cFoto" name="foto" type="file"/><br />
    </form>
    
    <a href="javascript:;" class="btPadrao addPeople">Salvar</a>

</div>

@endsection




@section('scripts')
    @parent

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('.addPeople').on('click', function(e){
                e.preventDefault();

                // alert('1');

                $('#formCadastrar').submit();

            });
        });
    </script>

@endsection