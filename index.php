<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ignacio López Ballesteros</title>
        <!--Import Google Icon Font-->
        <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/estilo.css" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <!-- ************************* HEADER  ****************************   -->
    
    <body>
        <header>
            <nav>
                <div class="nav-wrapper teal darken-2">
                    <a href="#" class="brand-logo center">Programador Web</a>
                </div>
            </nav>
        </header>
        
        <!-- **************** SECCION DE PRESENTACIÓN  *****************   -->
        <div class="container-fluid">
            <div class="row" id="presentacion">
                <div class="col s3 offset-s1 m3 offset-m1">
                    <img src="images/yo.jpg.jpg" alt="" class="circle responsive-img">
                </div>
                <div class="col s8 offset-s1 m6">
                    <div class="row">
                        <p class="flow-text">Ignacio López Ballesteros</p>
                    </div>
                    <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <blockquote class="flow-text">Esta página esta pensada para mostrar mis trabajos más importantes y servir o servirme de guía con algunos de los manuales que hice durante los dos cursos del ciclo de grado superior de Desarrollo de Aplicaciones Web realizado de forma presencial en el I.E.S Aguadulce de Aguadulce (Roquetas de Mar - Almería)</blockquote> 
                                </div>
                                <div class="row">
                                    <a class="flow-text" href="http://www.iesaguadulce.es/centro/">I.E.S Aguadulce</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>  
        </div>
        
        <!-- **************** SECCION DE MUESTRA DE MIS TRABAJOS  *****************   -->
        
        <div class="container">
            <div id="opcion" class="row">
                <div id="opcion1" class="col s12 m3 center">
                    <a href="" class=" z-depth-4"><i class="material-icons">web</i><br /> HTML + CSS</a>
                    <ul class="menuOculto white-text">
                        <li><a href="paginas/opcion1/VelocidadCss/ejercicio3_3.html" title="">Velocidades CSS</a></li>
                        <li><a href="paginas/opcion1/GirasolCSS/girasol.html" title="">Girasol CSS</a></li>
                        <li><a href="paginas/opcion1/Clinica/clinica.html" title="Web realizada poco a poco con HTML y CSS en Diseño de interfaces y finalizada con retoques de Boostrap para ser responsiva">Clínica Bootstrap Responsiva</a></li>
                        <li><a href="paginas/opcion1/Siles/index.html" title="Web realizada en 1º DAW con HTML+CSS Básicos">Siles</a></li>
                    </ul>
                </div>
                <div id="opcion2" class="col s12 m3 center">
                    <a href="" class=" z-depth-4"><i class="material-icons">developer_mode</i><br />Desarrollo Cliente</a>
                    <ul class="menuOculto">
                        <li><a href="paginas/opcion2/congresoDeLosImputados/Ejercicio5.html" title="">Congreso de los imputados con JavaScript</a></li>
                        <li><a href="paginas/opcion2/RelojCSS/ejercicio1.html">Reloj CSS + JavaScript</a></li>
                    </ul>
                </div>
                <div id="opcion3" class="col s12 m3 center">
                    <a href="" class=" z-depth-4"><i class="material-icons">storage</i><br />Desarrollo Servidor</a>
                    <ul class="menuOculto">
                        <li><a href="" title="Banco realizado con conocimientos básicos de PHP, sin acceso a base de datos, ni sesiones, ni cookies">Banco PHP - sin BD</a></li>
                    </ul>
                </div>
                <div id="opcion4" class="col s12 m3 center">
                    <a href="" class=" z-depth-4"><i class="material-icons">description</i><br />Otros/Manuales</a>
                    <ul class="menuOculto">
                        <li><a href="https://youtu.be/e5mUw2Mi8oI" title="Proyecto final del curso realizado a distancia con www.campusseas.com">Enlace a TPV Java</a></li>
                        <li><a href="paginas/opcion4/Manuales/" title="Varios">Manuales</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- **************** SECCION DE CONEXIÓN A API DE RED SOCIAL  *****************   
            https://geekytheory.com/como-usar-la-api-de-twitter-en-php -->
            
           <div class="divider" id="divisorRedSocial"></div> 
            <div class="row center" id="redSocial">
                

            </div>
            
            <!-- **************** SECCION DE CONTACTO  *****************   -->
            
            <div class="divider"></div>
            <div class="row" id="contacto" name="contacto">           <!-- Sección de contacto -->
                <h5>Contacto</h5>
                <form class="col s12" id="form">
                    <div class="row">
                        <div class="input-field col m6 s10">
                            <input id="nombre" type="text" name="nombre" class="validate" required minlength="3" />
                            <label data-error="Nombre erroneo (3 caracteres como mínimo)" data-success="correcto" for="nombre">Nombre: </label>
                        </div>
                        <div class="input-field col m6 s10">
                            <input id="suEmail" name="suEmail" type="email" class="validate" required />
                            <label for="suEmail" data-error="Email erroneo" data-success="correcto">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="texto" name="texto" class="materialize-textarea validate" required minlength="15" /></textarea>
                            <label data-error="Texto erroneo (15 caracteres como mínimo)" data-success="correcto" for="texto">Introduzca su petición, sugerencia...</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6" title="Los datos almacenados serán el nombre, email y el comentario introducido">
                            <input type="checkbox" class="filled-in" id="acepta" />
                            <label for="acepta">Acepta que sus datos sean almacenados</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="submit" class="btn-large" id="enviar" value="Enviar" disabled="true" />
                        </div>
                        <div class="card-panel" id="ultimaFila"></div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="page-footer teal darken-2 valign-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col l6 s6" id="footerIzq">
                       <p class="white-text"><a class="grey-text text-lighten-4 " href="#contacto"><i class="material-icons">feedback</i>Contacto</a></p>
                    </div>
                    <div class="col l4 offset-l2 s6">
                        <p class="white-text"><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img class="img-responsive" alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a></p>
                    </div>
                </div>
             </div>
        </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="bower_components/materialize/dist/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/miScript.js"></script>
</body>
</html>