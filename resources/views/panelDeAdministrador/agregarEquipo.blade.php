<!DOCTYPE html>
        <?php
        /**
         * Created by PhpStorm.
         * User: Administrador
         * Date: 14/10/2015
         * Time: 8:15 PM
         *
         */

        foreach ($equipo as $resultados) {
            echo "nombre del equipo".$resultados->name;
            echo "      ";
        }
                ?>
<br/>
<br/>
<a href="{{route('panelDeAdministrador')}}">
        Volver
</a>
</html>