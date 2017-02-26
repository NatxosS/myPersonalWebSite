<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ignacio López Ballesteros</title>
  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/estilo.css" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper teal darken-2">
				<a href="#" class="brand-logo center">Programador Web</a>
			</div>
		</nav>
	</header>
  	<nav id="footer">
    	<div class="nav-wrapper teal darken-2">
      
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul class="center hide-on-med-and-down">
	        <li><a href=""><i class="material-icons left">feedback</i>Contacto</a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	        <li><a href=""><i class="material-icons left">devices_other</i>Contacto</a></li>
	      </ul>
	    </div>
  	</nav>
 	<div class="container">
        <div class="row" id="presentacion">
            <div class="col s3 m3">
                <img src="images/yo.jpg.jpg" alt="" class="circle responsive-img">
            </div>
            <div class="col s9 m6">
            <h3 class="header">Ignacio López Ballesteros</h3>
            <div class="card small horizontal">
              <div class="card-image">
                
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <p>Esta página esta pensada para mostrar mis trabajos más importantes y servir o servirme de guía con algunos de los manuales que hice durante los dos cursos del ciclo de grado superior de Desarrollo de Aplicaciones Web realizado de forma presencial en el I.E.S Aguadulce de Aguadulce (Roquetas de Mar - Almería)</p>
                  
                </div>
                <div class="card-action">
                  <a href="http://www.iesaguadulce.es/centro/">I.E.S Aguadulce</a>
                </div>
              </div>
            </div>
          </div>
        </div>  
        
  		<div id="opcion" class="row">
	      <div id="opcion1" class="col s12 m3 center">
	        <a href="" class=" z-depth-4"><i class="material-icons">web</i><br /> HTML + CSS</a>
		    <ul class="menuOculto white-text">
		    	<li><a href="Paginas/opcion1/VelocidadCss/ejercicio3_3.html">Velocidades CSS</a></li>
		    	<li><a href="Paginas/opcion1/GirasolCSS/girasol.html">Girasol CSS</a></li>
		    	<li><a href="Paginas/opcion1/Clinica/clinica.html">Clínica Bootstrap Responsiva</a></li>
		    	<li><a href="Paginas/opcion1/Siles/index.html">Siles HTML+CSS Básicos</a></li>
		    </ul>
	      </div>
	      <div id="opcion2" class="col s12 m3 center">
	        <a href="" class=" z-depth-4"><i class="material-icons">developer_mode</i><br />Desarrollo Cliente</a>
              <ul class="menuOculto">
		    	<li><a href="Paginas/opcion2/congresoDeLosImputados/Ejercicio5.html">Congreso de los imputados con JavaScript</a></li>
                <li><a href="Paginas/opcion2/RelojCSS/ejercicio1.html">Reloj CSS + JavaScript</a></li>
		    </ul>
	      </div>
	      <div id="opcion3" class="col s12 m3 center">
	        <a href="" class=" z-depth-4"><i class="material-icons">storage</i><br />Desarrollo Servidor</a>
              <ul class="menuOculto">
		    	<li><a href="">Banco PHP - sin BD</a></li>
		    </ul>
	      </div>
			<div id="opcion4" class="col s12 m3 center">
	        	<a href="" class=" z-depth-4"><i class="material-icons">description</i><br />Otros/Manuales</a>
                <ul class="menuOculto">
		    	<li><a href="https://youtu.be/e5mUw2Mi8oI">Enlace a TPV Java</a></li>
		    	<li><a href="Paginas/opcion4/Manuales/">Manuales</a></li>
		    </ul>
	      </div>
    </div>
  </div>
        
	 <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
      	$( document ).ready(function() {
      		$(".button-collapse").sideNav();
      	});
      </script>
</body>
</html>