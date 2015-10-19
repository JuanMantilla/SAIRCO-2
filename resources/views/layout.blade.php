
<!DOCTYPE html>


    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- Custom CSS -->
        <link href="css/simple-sidebar.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

            <div id="wrapper">
                 <!-- Sidebar -->
                    <div id="sidebar-wrapper">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="@yield('link')">
                                    <h2>SAIRCO</h2>
                                </a>
                            </li>

                            </li>
                            <br/><br/><br/>
                            @yield('menu')
                        </ul>

                    </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                    <div id="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav navbar-nav navbar-right">
                                        @if (Auth::guest())
                                            <li><a href="{{route('login')}}">Ingresar</a></li>
                                            <li><a href="{{route('register')}}">Registrarse</a></li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('logout')}}">Salir</a></li>
                                                </ul>
                                            </li>
                                        @endif

                                    </ul>
                                    <input onclick="change();" class="btn btn-default" href="#menu-toggle" name="button" type="button" value="Ocutlar menu" id="menu-toggle" >
                                        <SCRIPT LANGUAGE="JavaScript">

                                            function change()
                                            {
                                                var elem = document.getElementById("menu-toggle");
                                                if (elem.value=="Ocutlar menu") elem.value = "Mostrar menu";
                                                else elem.value = "Ocutlar menu";
                                            }
                                        </SCRIPT>
                                    <hr class="layout">
                                    @yield('content')
                                    <hr class="layout">
                                    <A HREF="http://www.unitecnologica.edu.co/"><img src="imgs/logoUTB.PNG" style="float:right;" alt="logo UTB"></A>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Menu Toggle Script -->
            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>

            <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
            <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
            <script type="text/javascript">
                $('.form_datetime').datetimepicker({
                    //language:  'fr',
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showMeridian: 1
                });

            </script>
        </body>

</html>

