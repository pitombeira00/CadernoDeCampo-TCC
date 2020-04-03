
                        @if (Auth::guest())
                           @include('layout.menu.inicio')
                        @elseif(Auth::user()->altera_senha == 1)
                          
                        @else
                           @include('layout.menu.logado')
                        @endif
 