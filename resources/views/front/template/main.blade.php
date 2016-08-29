<!DOCTYPE html>
<html lang="es">
    <head>
        <meta>
        <title>@yield('title','Default') | Bienvenido</title>
        <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css" />
        <link rel="stylesheet" href="{{asset('plugins/sidevar/sidebar.css')}}" type="text/css" />
    </head>
    <body>
    <div id="wrapper">

        <!-- Sidebar -->
        @include('front.template.partial.nav')
       
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        
        <div id="page-content-wrapper">
            <div class="page-header">
              <h1>Bienvenido<small> a tu blog</small></h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title"> @yield('title','Default')</h3>
                          </div>
                          <div class="panel-body">
                            <section>
                                @include('flash::message')
                                @include('front.template.partial.errors')
                                @yield('content')
                            </section>
                            
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
            <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js' , true) }}"></script>
        @yield('js')
        
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    </body>
</html>