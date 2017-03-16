<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ignacio López Ballesteros</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <!-- ************************* HEADER  ****************************   -->
    
    <body>
        <header>
            <div >
                <nav>
                    <div class="nav-wrapper light-blue">
                        <a href="#!" class="brand-logo center">PROGRAMADOR <span class="hide-on-small-only">WEB</span></a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down" id="menuWeb">
                            <li><a title="Contacto" href="#divisorContacto"><i class="fa fa-comments" aria-hidden="true"></i></a></li>
                            <li><a title="Mi cuenta GitHub" href="https://github.com/NatxosS" target='_blank'><i class="fa fa-github" aria-hidden="true"></i></a></li>
                            <li><a title="Conexión API Twitter"href="#divisorRedSocial"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a href="#divisorContacto"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Contacto</a></li>
                            <li><a href="https://github.com/NatxosS" target='_blank'><i class="fa fa-github" aria-hidden="true"></i>&nbsp;GitHub</a></li>
                            <li><a href="#divisorRedSocial"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;API Twitter</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        
        <!-- **************** SECCION DE PRESENTACIÓN  *****************   -->
        <div class="container-fluid">
            <div class="row" id="presentacion">
                <div class="col s3 offset-s2 m3 offset-m1">
                    <div class="row cajaImagen">
                        <div class="col m9 offset-m1 s12"><img src="images/yo.jpg.jpg" alt="Mi foto" class="circle responsive-img"></div>
                    </div>
                    <div class="row cajaEnlace">
                        <h4 class="flow-text center-align"><a href="https://www.linkedin.com/in/ignaciolb" target='_blank'>LinkedIn</a></h4>
                    </div>
                </div>
                <div class="col s8 offset-s1 m6">
                    <div class="row">
                        <p class="flow-text">Ignacio López Ballesteros</p>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <blockquote class="flow-text presentacion">Esta página nace con el objetivo de mostrar los trabajos realizados durante el grado superior de <a href="images/N3_IFCD0210_es_pub.pdf" target='_blank'> Desarrollo de Aplicaciones Web</a> en el <a href="http://www.iesaguadulce.es/centro/" target='_blank'>I.E.S. Aguadulce</a>, además de una oportunidad de desarrollar los contenidos aprendidos.</blockquote> 
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
                    <a class="opciones" href=""><i class="material-icons">web</i><br /> HTML + CSS</a>
                    <ul id="pr" class="menuOculto white-text">
                        <li><a href="paginas/opcion1/VelocidadCss/ejercicio3_3.html" title="">Velocidades CSS</a></li>
                        <li><a href="paginas/opcion1/GirasolCSS/girasol.html" title="">Girasol CSS</a></li>
                        <li><a href="paginas/opcion1/Clinica/clinica.html" title="Web realizada poco a poco con HTML y CSS en Diseño de interfaces y finalizada con retoques de Boostrap para ser responsiva">Clínica Bootstrap Responsiva</a></li>
                        <li><a href="paginas/opcion1/Siles/index.html" title="Web realizada en 1º DAW con HTML+CSS Básicos">Siles</a></li>
                    </ul>
                </div>
                <div id="opcion2" class="col s12 m3 center">
                    <a class="opciones" href=""><i class="material-icons">developer_mode</i><br />Desarrollo Cliente</a>
                    <ul class="menuOculto">
                        <li><a href="paginas/opcion2/congresoDeLosImputados/Ejercicio5.html" title="">Congreso de los imputados con JavaScript</a></li>
                        <li><a href="paginas/opcion2/RelojCSS/ejercicio1.html">Reloj CSS + JavaScript</a></li>
                    </ul>
                </div>
                <div id="opcion3" class="col s12 m3 center">
                    <a class="opciones" href=""><i class="material-icons">storage</i><br />Desarrollo Servidor</a>
                    <ul class="menuOculto">
                        <li><a href="paginas/opcion3/Banco/index.php" title="Banco realizado con conocimientos básicos de PHP, sin acceso a base de datos, ni sesiones, ni cookies">Banco PHP - sin BD</a></li>
                    </ul>
                </div>
                <div id="opcion4" class="col s12 m3 center" name="redSocial">
                    <a class="opciones" href=""><i class="material-icons">description</i><br />Otros / Manuales</a>
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
            
            <div class="divider" id="divisorContacto"></div>

            <div class="row" id="contacto">           <!-- Sección de contacto -->
                <h5>Contacto</h5>
                <form class="col s12 " id="form">
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
                            <input type="submit" class="btn-large light-blue" id="enviar" value="Enviar" disabled="true" />
                        </div>
                        <div class="card-panel" id="ultimaFila"></div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="page-footer light-blue valign-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col l2 s2" id="footerIzq">
                       
                    </div>
                    <div class="col l2 offset-l4 s3" id="imagenCC">
                        <p class="white-text center-align">
                            <a  id="enlaceCC" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target='_blank'>
                                <img class="img-responsive" alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
                            </a>
                        </p>
                    </div>
                    <div class="col l4 s7" id="animacion">
                        <span class="white-text" > Autor: Ignacio López Ballesteros</span>
                    </div>
                </div>
             </div>
        </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/materialize/dist/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/miScript.js"></script>
</body>
</html>