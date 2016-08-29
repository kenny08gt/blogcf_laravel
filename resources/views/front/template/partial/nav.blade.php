 <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Bienvenido
                    </a>
                </li>
                <li>
                    <a href="{{ route('front.index') }}">Inicio</a>
                </li>
                <li>
                    <a href="#">Categorias</a>
                    <ul >
                    @foreach($category as $cat)
                        <li role="presentation" class="active"><a><span class="">{{$cat->name}}<span class="badge">{{$cat->articles->count()}}</span></span></a></li>
                    @endforeach
                    </ul>
                    
                </li>
                <li>
                    <a href="#">Tags</a>
                    <ul >
                    @foreach($tags as $tag)
                        <li class=""><a><span class="label label-success">{{$tag->name}}</span></a></li>
                    @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#">Articulos</a>
                    @yield('articulos')
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>