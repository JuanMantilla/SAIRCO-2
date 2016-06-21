@extends ('acercaDe/acercaDeLayout')
    @section ('title')
        Juan Mantilla
    @endsection
    @section('ContenidoAcercaDe')
        <div class="centrado">
            <A HREF="{{route('JuanMantilla')}}"><img src="imgs/Juan Mantilla.PNG" class="imagenGrande" alt="Juan Mantilla"></A><h2><strong>Juan Sebastián Mantilla Quintero</strong></h2><br/>
            <div class="texto">
                Estudiante de ingeniería de sistemas de la Universidad Tecnológica de bolívar. Posee conocimientos en JAVA,
                c++, php, python y html5 con css y boostrap con certificado de asistencia al curso de certificación de JAVA
                essentials 7 y habilidades con el framework Laravel. Además, tiene conocimientos en realización de aplicaciones Android nativas.
            </div>
        </div>
    @endsection