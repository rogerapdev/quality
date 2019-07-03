<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('elements.head')
</head>

<body>

<div id="conteudoGeral">

    <div id="topoGeral">
        @include('elements.header')
    </div>
    
    <div id="baixoGeral">
    
    	<div id="menuEsq">
            @include('elements.menu')
        </div>
        
        <div id="conteudoDir">

            @yield('content')

        </div> <!-- FIM CONTEUDO DIR -->
    
    </div>

</div>

@include('elements.scripts')

</body>
</html>