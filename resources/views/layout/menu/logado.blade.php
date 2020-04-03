   <ul id="_NavMovimentacao" class="dropdown-content">
      <li><a href="{{route('metas.inicio')}}">Metas</a></li>
      <li><a href="{{route('apontamento.inicio')}} ">Apontamento</a></li>
  </ul>
  <!--menu 2-->
   <ul id="_NavCadastro" class="dropdown-content">
      <li><a href="{{route('safra.inicio')}} ">Safra</a></li>
      <li><a href="{{route('local.inicio')}} ">Locais</a></li>
      <li><a href="{{route('atividade.inicio')}} ">Atividades</a></li>
      <li><a href="{{route('funcionario.inicio')}}">Funcionários</a></li>
      <li><a href="{{route('usuario.inicio')}} ">Usuarios</a></li>
  </ul>
<nav>
    <div class="nav-wrapper white">
        <div class="container">
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons blue lighten-3 ">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{route('home')}} " class="blue-text text-darken-2">Inicio</a></li>
            <li><a class="dropdown-button blue-text text-darken-2" href="#!" data-activates="_NavCadastro">Cadastro<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button blue-text text-darken-2" href="#!" data-activates="_NavMovimentacao">Metas/Atividades<i class="material-icons right">arrow_drop_down</i></a></li>
           <li class="nav-item dropdown blue">
                                <div class="blue-text text-darken-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
          </ul>

             <ul id="mobile-demo" class="side-nav">
              <li><div class="user-view">
                <div class="background">
                  <img src="imagem/parreira2.jpg">
                </div>
                <a href="#!user"><img class="circle" src="imagem/icon.jpg"></a>
                <a href="#!name"><span class="white-text name">{{auth()->user()->name}}</span></a>
                <a href="#!email"><span class="white-text email">
                @if (auth()->user()->tipo == 1)
                    Gerente
                @elseif (auth()->user()->tipo == 2)
                    Encarregado
                @elseif (auth()->user()->tipo == 3)
                    Administrativo
                @elseif (auth()->user()->tipo == 4)
                    Fiscal
                @endif
                </span></a>
              </div></li>
              <li><a class="subheader"><i class="material-icons">home</i>Inicio</a></li>
              <li><div class="divider"></div></li>
              <li><a href="{{route('home')}} " class="waves-effect">Gráficos</a></li>
              <li><a class="subheader"><i class="material-icons">contacts</i>Cadastros</a></li>
              <li><div class="divider"></div></li>
              <li><a href="{{route('safra.inicio')}}" class="waves-effect">Safra</a></li>
              <li><a href="{{route('local.inicio')}}" class="waves-effect">Locais</a></li>
              <li><a href="{{route('atividade.inicio')}}" class="waves-effect">Atividades</a></li>
              <li><a href="{{route('funcionario.inicio')}}" class="waves-effect">Funcionarios</a></li>
              <li><a href="{{route('usuario.inicio')}}" class="waves-effect">Usuarios</a></li>
              
         
              <li><a class="subheader"><i class="material-icons">business</i>Metas/Atividades</a></li>
              <li><div class="divider"></div></li>
              <li><a class="waves-effect" href="{{route('metas.inicio')}}">Metas</a></li>
              <li><a class="waves-effect" href="{{route('apontamento.inicio')}}">Apontamento</a></li>
              <li class="nav-item dropdown blue">
                                <div class="blue-text text-darken-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
          </div>
    </div>
</nav>


        