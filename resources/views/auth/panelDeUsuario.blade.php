
<!DOCTYPE html>


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de usuario</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <a href="#">
                    Panel de usuario
                </a>
            </li>
            <li>
                <a href="#">Cambiar tus datos</a>
            </li>
            <li>
                <a href="#">Reservar un equipo</a>
            </li>
            <li>
                <a href="#">Cancelar una reserva</a>
            </li>
        </ul>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('logout')}}">Salir</a></li>
                            </ul>
                        </li>

                    </ul>
                    <h1>Bienvenido!</h1>
                    <p>En este momento estamos en construccion, muy poronto podras:</p>
                    <p>
                    <ul>
                        <li><strong>Reservar un recurso</strong> de computo de las salas de informatica de la UTB <strong>ONLINE!</strong>.</li>
                        <li><strong>Cancelar una reserva.</strong></li>
                    </ul>
                    </p>
                    <input onclick="change();" class="btn btn-default" href="#menu-toggle" name="button" type="button" value="Ocutlar menu" id="menu-toggle" ></input>


                    <SCRIPT LANGUAGE="JavaScript">

                        function change() // no ';' here
                        {
                            var elem = document.getElementById("menu-toggle");
                            if (elem.value=="Ocutlar menu") elem.value = "Mostrar menu";
                            else elem.value = "Ocutlar menu";
                        }
                    </SCRIPT>
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
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
