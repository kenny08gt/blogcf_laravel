<!DOCTYPE html>
<html lang="es">
    <head>
        <meta>
        <title>@yield('title','Default') | Panel de administración</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css', true) }}" />
    </head>
    <body>
        @include('admin.template.partial.nav')
        <section>
            @yield('content')
        </section>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js' , true) }}"></script>
    </body>
</html>