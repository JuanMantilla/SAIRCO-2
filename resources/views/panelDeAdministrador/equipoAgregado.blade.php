
<!DOCTYPE html>


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

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
                <a href="{{route('panelDeAdministrador')}}">
                    Panel de administrador
                </a>
            </li>
            <li>
                <a href="#">Cambiar tus datos</a>
            </li>
            <li>
                <a href="{{route('viewAgregarEquipo')}}">Agregar equipo de computo</a>
            </li>
            <li>
                <a href="#">Agregar salon de computo</a>
            </li>
            <li>
                <a href="#">Eliminar equipo de computo </a>
            </li>
            <li>
                <a href="#">Eliminar salon de computo</a>
            </li>
            <li>
                <a href="#">Actualizar horarios</a>
            </li>
            <li>
                <a href="#">Obtener informacion</a>
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

        <p>Equipo agregado exitosamente.</p>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>