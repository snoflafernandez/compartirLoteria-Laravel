<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span>&#127808;</span> CompartirLoteria.com</a>

        @if( Auth::check() )
            <a class="nav-link" href="{{url('/grupo/{$id}')}}">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>Mi grupo 
                <i class="fa fa-user-o"></i>
            </a>
            <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                    Cerrar sesión <i class="fa fa-sign-out"></i>
                </button>
            </form>
        @else
        {{--Si lo de arriba (@else) no funciona cuando se pruebe sustituir por @elseif--}}
            <a class="nav-link" href="{{url('/login')}}">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Iniciar sesión 
                <i class="fa fa-user-o"></i>
            </a>
        @endif 
        
    </div>
</nav>