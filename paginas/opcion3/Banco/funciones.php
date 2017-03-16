<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// -------------   * *  VARIABLES  * *  --------------

static $errorFecha;         // variables para controlar los errores de entrada, estáticas para que mantengan el valor asignado hasta que se lo cambiemos
static $errorConcepto;
static $errorCantidad;

/* ----------------------  * FUNCIONES *  -------------------------- */



/* ---------------   FUNCIONES PLANTILLA  -----------------  */

function mostrar_Movimientos($datos) {          // nos muestra los movimientos cada vez que recargamos esta sección
    ?>
    <div class="operaciones" id="movimientos">    
        <h1>Movimientos</h1>
        <fieldset><table class="tabla" id="tablaMov">
                <thead>
                    <tr id="cabecera">
                        <th>Fecha</th>
                        <th class="colConcepto">Concepto</th>
                        <th>Cantidad</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    $elementos = count($datos);

    if ($elementos==0) {           // si no hay movimientos lo comunicamos al usuario
        print "<script>alert(\"No existen movimientos en esta cuenta\")</script>";
    } else {
        $datosInvertidos = array_reverse($datos);     // le damos la vuelta al vector para imprimir los 10 últimos movimientos                                    

        if ($elementos <= 10) {
            for ($i = 0; $i < $elementos; $i++) {

                print "<tr>";
                for ($j = 0; $j < 4; $j++) {                                     // imprimimos solo los 3 primeros elementos de cada movimiento,
                    if (($datosInvertidos[$i][2]<0 && $j == 2) || ($datosInvertidos[$i][3]<0 && $j == 3)) {
                        print "<td class='rojo'>";
                        formatearNumero($datosInvertidos[$i][$j]); 
                    } else {
                        print "<td>"; 
                        formatearNumero($datosInvertidos[$i][$j]);                         /* si el valor a imprimir es un número le aplicamos 
                                                                                                * el formato español con dos decimales
                                                                                                */
                    }
                }
                print "</tr>";
            }
        } else {


            for ($i = 0; $i < 10; $i++) {
                print "<tr>";
                for ($j = 0; $j < 4; $j++) {                                     // imprimimos solo los 3 primeros elementos de cada movimiento,
                    if (($datosInvertidos[$i][2]<0 && $j == 2) || ($datosInvertidos[$i][3]<0 && $j == 3)) {
                        print "<td class='rojo'>"; 
                        formatearNumero($datosInvertidos[$i][$j]);    
                    } else {
                        print "<td>"; 
                        formatearNumero($datosInvertidos[$i][$j]); 
                    }
                }
                print "</tr>";
            }
        }
                                            /* ------  MOSTRAMOS EL TOTAL -------*/
        if ($datosInvertidos[0][3]<0) {
            print "<tr><td id='total' colspan='3'><span class='total'>SALDO ACTUAL</span></td><td><span class='rojo'>";
            print number_format($datosInvertidos[0][3], 2, ",", "."); // ponemos el total en formato español
            print "</span></td></tr>";
        } else {
            print "<tr><td id='total' colspan='3'><span class='total2'>SALDO ACTUAL</span></td><td><span id='total'>";
            print number_format($datosInvertidos[0][3], 2, ",", "."); // ponemos el total en formato español
            print "</span></td></tr>";
        }
    }
    ?>
                </tbody>
            </table></fieldset>
    </div>
                    <?php
                }

                //  ------------------------------------------------------------  MOSTRAR MOVIMIENTOS


                function mostrar_Plantilla() {                     // Nos muestra la plantilla a cargar cada vez que recargamos la web
                    ?>
    <!--               Cabecera            -->

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Diodos Bank</title>
            <link href="estilo.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <header>
                <h1><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Diodos Bank</a> </h1><h3> <a id="volver" href="../../../index.php">  Volver a ignaciolb.es</a></h3>
            </header>

            <!--      caja que nos mostrará la barra de Navegación     -->      

            <form name="formularios" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">    <!-- formulario que contwendra todos los formularios y el input hidden
                                                                                                            que nos ayudara a pasar los datos entre recargas -->
                    
                <nav>
                    <table>
                        <tr>
                            <td><input type="submit" name="movimientos" value="Movimientos" /></td>     <!-- Input que funcionarán de enlaces a cada sección -->
                            <td><input type="submit" name="ingresar" value="Ingresar" /></td>
                            <td><input type="submit" name="pagar" value="Pagar" /></td>
                            <td><input type="submit" name="devolver" value="Devolver" /></td>
                        </tr>
                    </table>
                </nav>
                <section>
                    <div class="slide">     <!-- capa contenedora de las diferentes secciones -->
                    
    <?php
}

// ----------------------------------------------------------------------------- DEVOLUCION 


function mostrarDevolución($datos) { /* plantilla con la que mostraremos el formulario devolver, los 3 últimos 
 * movimiento para eliminar uno de ellos */
    ?><div class="operaciones" id="devolver">
        <h1>Devolver Recibos</h1>
            <fieldset>
                <legend>Últimos 3 Recibos, escoga uno</legend>
                <table class="tabla">
                    <thead id="cabecera">
                        <tr id="cabecera">
                            <th>Select</th>
                            <th>Fecha</th>
                            <th class="colConcepto">Concepto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $elementos = count($datos);

    if ($elementos == 0) {           // si no hay movimientos lo comunicamos al usuario
        print "<script>alert(\"No existen movimientos en esta cuenta\")</script>";
    } else {
        $datosInvertidos = array_reverse($datos);     // le damos la vuelta al vector para imprimir los 5 últimos movimientos

        for ($i = 0; $i < $elementos; $i++) {
            $pos = $i + 1;
            
            if ($datosInvertidos[$i][2]<0) {        // este if es solo para mostrar los recibos, es decir saldos negativos
                print "<tr><td><input type=\"radio\" name=\"ultMov\" value=\"$pos\" /></td>";
                for ($j = 0; $j < 3; $j++) {                                     // imprimimos solo los 3 primeros elementos de cada movimiento,
                    print "<td>"; 
                    formatearNumero($datosInvertidos[$i][$j]);                      /* si el valor a imprimir es un número le aplicamos 
                                                                                            * el formato español con dos decimales
                                                                                            */
                }
                print "</tr>";
            }
        }
    }
    ?>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="enviarDevolver" id="enviarDevolver" value="Devolver" />
                                </fieldset>
                        </div>
    <?php
}

//  -------------------- FUNCIONES ESPECIFICAS  ---------------


function Calcular_Saldo_contable(&$saldo, $cantidad) {     // Nos calculara el saldo total en la cuenta, tanto si es pago como ingreso o devolución
    // jugaremos con los signos según sea para una cosa u otra
    return $saldo += $cantidad;
}


function Validar_Datos($fechaTexto, $con, $cant) {     // Nos valida los campos fecha, concepto y cantidad
    if (validar_fecha($fechaTexto) == true) {  // pero también podremos saber cual de ellos es el erroneo para indicarselo al usuario
        $errorFecha = false;
    } else {
        $errorFecha = true;
    }

    if (is_string($con)) {
        $errorConcepto = false;
    } else {
        $errorConcepto = true;
    }

    if (is_numeric($cant)) {
        $errorCantidad = false;
    } else {
        $errorCantidad = true;
    }

    if ($errorCantidad || $errorConcepto || $errorFecha) {
        return FALSE;
    } else {
        return TRUE;
    }
}


function validar_fecha($texto) {   // nos comprueba que el formato con el cual el cliente nos ha introducido la fecha
    // sea el correcto, al igual que también nos comprueba que sea una fecha correcta.
    $datosFecha = explode('/', $texto);
    // cogemos cada parte del string que recibimos en el array datosFecha
    $dia = $datosFecha[0];                        // que serán el día, mes y año, para poder trabajar con ellos
    $mes = $datosFecha[1];
    $anio = $datosFecha[2];



    if (checkdate($mes, $dia, $anio)) {
        return TRUE;
    } else {
        return FALSE;
    }
}


function formatearNumero($num) {        /* utilizamos esta función para imprimir celdas 
 * comprobamos si el parametro que recibe es un número, y si lo es lo formateamos en 
 * formato español
 */
    if (is_numeric($num)) { 
        print number_format($num, 2, ",", ".");
    } else {
        print $num;
    }
    print "</td>";
}