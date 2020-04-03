<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "{{asset('imagem/parreira.jpg')}} "/>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 
    <title>Tcc - Caderno de Campo</title>

    
</head>
<body id="app-layout"  @if(Session::has('mensagem')) id="app-layout" onload="Materialize.toast('{{Session::get('mensagem')['msg']}}', 4000)" @endif>
  @include('layout.typemenu')

  <main>
    @yield('content')
  </main>
    

<footer class="page-footer blue darken-2" >
  <div class="footer-copyright">
    <div class="container">
    Caderno de Campo, Trabalho de conclusão de curso
    </div>
  </div>
</footer>

    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>

    <script src="{{asset('js/consulta.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
