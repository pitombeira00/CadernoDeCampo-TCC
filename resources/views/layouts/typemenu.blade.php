
                        @if (Auth::guest())
                           @include('layout.menu.inicio')
                        @else
                           @include('layout.menu.logado')
                        @endif
 