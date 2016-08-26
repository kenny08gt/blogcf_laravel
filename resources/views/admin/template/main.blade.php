<!DOCTYPE html>
<html lang="es">
    <head>
        <meta>
        <title>@yield('title','Default') | Panel de administración</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css', true) }}" />
    </head>
    <body>
        <div class="container">
            @include('admin.template.partial.nav')
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"> @yield('title','Default')</h3>
              </div>
              <div class="panel-body">
                <section>
                    @include('flash::message')
                    @yield('content')
                </section>
                
              </div>
            </div>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
            <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js' , true) }}"></script>
        </div>
    </body>
</html>