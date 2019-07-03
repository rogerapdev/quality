@extends('layouts.default')

@section('content')

            <div id="listaPessoas">
            	<h1>Cadastros</h1>

				<a href="{{ route('people.delete-many') }}" data-token='{{ csrf_token() }}' class="btPadraoExcluir deleteSelected">Excluir</a>
                
                <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <th width="5%"><input type="checkbox" name="selectAll" value="1" /></th>
                        <th width="10%">ID</th>
                        <th class="tL">Nome</th>
                        <th width="20%">Data de Nascimento</th>
                        <th width="10%">Dep</th>
                        <th width="8%">Status</th>
                    </tr>

                    <tr>
                    	<td align="center" style="border-left:0;"><input type="checkbox" name="selected[]" value="001" /></td>
                    	<td align="center">001</td>
                    	<td><a href="{{ route('people.edit', [1]) }}" class="linkUser">Fulano de Tal Silva</a></td>
                    	<td align="center">08/12/1982</td>
                        <td align="center"><a href="{{ route('people.dependents.create', [1]) }}" class="btAdicionar"></a></td>
                    	<td align="center"><a href="javascript:;" class="btCinza"></a></td>
                    </tr>
                    
		    <tr bgcolor="#cddeeb">
                        <td align="center" style="border-left:0;"><input type="checkbox" name="selected[]" value="001" /></td>
                    	<td align="center">001</td>
                    	<td><a href="{{ route('people.edit', [1]) }}" class="linkUser">Fulano de Tal Silva</a></td>
                    	<td align="center">08/12/1982</td>
                        <td align="center"><a href="{{ route('people.dependents.create', [1]) }}" class="btAdicionar"></a></td>
                    	<td align="center"><a href="javascript:;" class="btVerde"></a></td>
                    </tr>
                    
                    <tr>
                    	<td align="center" style="border-left:0;"><input type="checkbox" name="selected[]" value="001" /></td>
                    	<td align="center">001</td>
                    	<td><a href="{{ route('people.edit', [1]) }}" class="linkUser">Fulano de Tal Silva</a></td>
                    	<td align="center">08/12/1982</td>
                        <td align="center"><a href="{{ route('people.dependents.create', [1]) }}" class="btAdicionar"></a></td>
                    	<td align="center"><a href="javascript:;" class="btVerde"></a></td>
                    </tr>
                    
                    <tr bgcolor="#cddeeb">
	                <td align="center" style="border-left:0;"><input type="checkbox" name="selected[]" value="001" /></td>
                    	<td align="center">001</td>
                    	<td><a href="{{ route('people.edit', [1]) }}" class="linkUser">Fulano de Tal Silva</a></td>
                    	<td align="center">08/12/1982</td>
                        <td align="center"><a href="{{ route('people.dependents.create', [1]) }}" class="btAdicionar"></a></td>
                    	<td align="center"><a href="javascript:;" class="btVerde"></a></td>
                    </tr>
                   
                </table>
            	
            </div>
            
            <div id="paginacao">
                <a href="" class="btSeta1"></a> <div id="pags">1 de 10</div> <a href="" class="btSeta2"></a> 
                <select id="paginas">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

@endsection


@section('scripts')
    @parent

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('.deleteSelected').on('click', function(e){
                e.preventDefault();

				var form = $("<form/>", { 
						action: $(this).attr('href'),
						method: 'POST'
					});

				form.append( 
				    $("<input>", { 
				    	type:'hidden', 
				        name: '_token',
				        value: $(this).data('token')
					})
				 );

				$('input[name*=selected]:checked').each(function( index ) {
					form.append($(this));
				});
				$('body').append(form);

				form.submit();

            });

            $('input[name=selectAll]').change();
			$('input[name=selectAll]').on('change', function(e) {
			    $('input[name*=selected]').prop('checked',this.checked);
			});

        });
    </script>

@endsection