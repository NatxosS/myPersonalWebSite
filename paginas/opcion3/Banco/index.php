<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- ******************   INICIO        ********************--> 

<?php
/* -----INCLUSIÓN DE FICHEROS EXTERNOS  ---- */


require_once 'funciones.php';    // exigimos que se inserte el fichero con nuestras funciones, solo una vez


/*  -------------  VARIABLES --------------- */


$datos = array();       // variable que almacenará los movimientos, cada movimiento es un array, por lo tanto tenemos un array multidimensional
$saldo = 0;         // variable que almacenará el saldo inicializamos a cero para no tener problemas de ejecución de código cuando no halla movimientos


if (isset($_POST['datosOcultos'])) {                /* si esta inicializado el input datos ocultos recuperamos los datos
                                                    *  descodificado y deserializando la información
                                                    */
    $datos = unserialize(base64_decode($_POST['datosOcultos']));
    
    if (count($datos) - 1 >= 0) {                   // aprovechamos para recuperar el último saldo 
        $saldo = $datos[count($datos) - 1][3];
    }
}


/*  --------------  CÓDIGO PRINCIPAL  ------------ Empezamos a mostrar código HTML */ 



mostrar_Plantilla();

/* ---------------------   ACCESO DESDE BOTONES DE MENÚ DE NAVEGACIÓN   ---------- */

/// BOTÓN A MOVIMIENTOS -------------------------------------------

if (isset($_REQUEST['movimientos'])) {
    mostrar_Movimientos($datos);
} else {

    /// BOTÓN A INGRESAR  --------------------------------------

    if (isset($_REQUEST['ingresar'])) {
        ?>
        <div class="operaciones" id="ingresar">
            <h1>Ingreso</h1>
            <fieldset>
                <br />
                <label for="fechaIngreso">Fecha</label>
                <input type="text" id="fechaIngreso" name="fechaIngreso" placeholder="dd/mm/yyyy" /><br /><br />
                <label for="conceptoIngreso">Concepto:</label>
                <input type="text" name="conceptoIngreso" id="conceptoIngreso" size="50px" /><br /><br />
                <label for="cantidadIngreso">Cantidad:</label>
                <input type="text" name="cantidadIngreso" id="cantidadIngreso" /><br /><br />
                <input type="submit" id="enviarIngreso" name="enviarIngreso" value="Ingresar" />
            </fieldset>
        </div>
        <?php
    } else {

        /// BOTÓN A PAGAR  --------------------------------

        if (isset($_REQUEST['pagar'])) {
            ?>
            <div class="operaciones" id="pagar">
                <h1>Pagar Recibos</h1>
                <fieldset>
                    <br />
                    <label for="fechaPagar">Fecha</label>
                    <input type="text" id="fechaPagar" name="fechaPagar" placeholder="dd/mm/yyyy" />
                    <br /><br />
                    <label for="conceptoPagar">Concepto:</label>
                    <input type="text" name="conceptoPagar" id="conceptoPagar" size="50px" /><br /><br />
                    <label for="cantidadPagar">Cantidad:</label>
                    <input type="text" name="cantidadPagar" id="cantidadPagar" /><br /><br />
                    <input type="submit" id="enviarPagar" name="enviarPagar" value="Pagar" />
                </fieldset>
            </div>
            <?php
        } else {

            // BOTÓN DEVOLVER  --------------------------------

            if (isset($_REQUEST['devolver'])) {
                mostrarDevolución($datos);
            } else {


                
                
                /* ---------------------   ACCESO DESDE BOTONES DE ENVÍO DE FORMULARIO   ---------- */

                
                

                // BOTON INGRESAR (enviarIngreso)  ///////////////////////////////////////////////////////////////////////////////////////////////


                if (isset($_REQUEST['enviarIngreso'])) {
                    if (!Validar_Datos($_REQUEST['fechaIngreso'], $_REQUEST['conceptoIngreso'], $_REQUEST['cantidadIngreso'])) {

                        /* Aquí estamos comprobando que la fecha sea válida, si el concepto es un dato string, y si cantidad es numerico 
                         * si no lo esentramos al if   */
                        ?><div class="operaciones" id="ingresar">
                            <h1>Ingreso</h1>
                            <fieldset>
                                <br />
                                <label for="fechaIngreso">Fecha</label>
                                <input type="text" id="fechaIngreso" name="fechaIngreso" placeholder="dd/mm/yyyy" value="<?php
                        if (isset($_REQUEST['enviarIngreso']) && $errorFecha == FALSE) {    // si volvemos a acceder y pusimos bien la fecha,
                            echo $_REQUEST['fechaIngreso'];            // mostramos la que escribimos
                        }
                        ?>"/>
                                <?php
                                if ((empty($_REQUEST['fechaIngreso']) || $errorFecha) && isset($_REQUEST['enviarIngreso'])) {
                                    print "<span style='color:red'> <-- ¡No has introducido nunguna fecha correcta!</span>";
                                }
                                ?>
                                <br /><br />
                                <label for="conceptoIngreso">Concepto:</label>
                                <input type="text" name="conceptoIngreso" id="conceptoIngreso" size="40px" value="<?php
                        if (isset($_REQUEST['enviarIngreso']) && $errorConcepto == FALSE) {    // si volvemos a acceder y pusimos bien el concepto,
                            echo $_REQUEST['conceptoIngreso'];            // mostramos el que escribimos
                        }
                                ?>"/>
                                <?php
                                if ((empty($_REQUEST['conceptoIngreso']) || $errorConcepto) && isset($_REQUEST['enviarIngreso'])) {
                                    print "<span style='color:red'> <-- ¡No has introducido nungún concepto correcto!</span>";
                                }
                                ?><br /><br />
                                <label for="cantidadIngreso">Cantidad:</label>
                                <input type="text" name="cantidadIngreso" id="cantidadIngreso" value="<?php
                                       if (isset($_REQUEST['enviarIngreso']) && $errorCantidad == FALSE) {    // si volvemos a acceder y pusimos bien la cantidad,
                                           echo $_REQUEST['cantidadIngreso'];            // mostramos la que escribimos
                                       }
                                       ?>"/>
                                <?php
                                if ((empty($_REQUEST['cantidadIngreso']) || $errorCantidad) && isset($_REQUEST['enviarIngreso'])) {
                                    print "<span style='color:red'> <-- ¡No has introducido nunguna cantidad correcta!</span>";
                                }
                                ?><br /><br />
                                <input type="submit" id="enviarIngreso" name="enviarIngreso" value="Ingresar" />

                            </fieldset>
                            <span style="color:red"><pre>            /|\                                          /|\
          |         ¡Algún dato incorrecto!            |</pre></span>
                        </div><?php
                    } else {

                        // ----------  si hemos realizado correctamente el ingreso -------------
                        // -----------    AÑADIMOS AL VECTOR -------------------------
                        // con los datos validados de la operación ingresar y llamamdo a la función Calcular_Saldo_Contable creamos un array 
                        // que añadiremos al array datos
                        $nuevoSaldo = Calcular_Saldo_contable($saldo, $_REQUEST['cantidadIngreso']);    // calculamos el nuevo saldo

                        $nuevoMovimiento = array($_REQUEST['fechaIngreso'], $_REQUEST['conceptoIngreso'], $_REQUEST['cantidadIngreso'], $nuevoSaldo);

                        array_push($datos, $nuevoMovimiento);

                        //---------- MOSTRAMOS  -----------------------------
                                ?> 
                        <script>alert("Ingreso realizado con éxito")</script>   <!-- notificamos la realización correcta del ingreso  -->

                        <?php
                        mostrar_Movimientos($datos);
                    }
                } else {


                    
                    // BOTON PAGAR (enviarPagar)  ///////////////////////////////////////////////////////////////////////////////////////////////

                    

                    if (isset($_REQUEST['enviarPagar'])) {


                        if (!Validar_Datos($_REQUEST['fechaPagar'], $_REQUEST['conceptoPagar'], $_REQUEST['cantidadPagar'])) {
                            ?><div class="operaciones" id="pagar">
                                <h1>Pagar Recibos</h1>
                                <fieldset>
                                    <br />
                                    <label for="fechaPagar">Fecha</label>
                                    <input type="text" id="fechaPagar" name="fechaPagar" value="<?php
                            if (isset($_REQUEST['enviarPagar']) && $errorFecha == FALSE) {    // si volvemos a acceder y pusimos bien la fecha,
                                echo $_REQUEST['fechaPagar'];            // mostramos la que escribimos
                            }
                            ?>"/>

                            <?php
                            if ((empty($_REQUEST['fechaPagar']) || $errorFecha) && isset($_REQUEST['enviarPagar'])) {
                                print "<span style='color:red'> <-- ¡No has introducido nunguna fecha correcta!</span>";
                            }
                            ?>
                                    <br /><br />
                                    <label for="conceptoPagar">Concepto:</label>
                                    <input type="text" name="conceptoPagar" id="conceptoPagar" size="40px" value="<?php
                                    if (isset($_REQUEST['enviarPagar']) && $errorConcepto == FALSE) {    // si volvemos a acceder y pusimos bien el concepto,
                                        echo $_REQUEST['conceptoPagar'];            // mostramos el que escribimos
                                    }
                                    ?>"/>

                                    <?php
                                    if ((empty($_REQUEST['conceptoPagar']) || $errorConcepto) && isset($_REQUEST['enviarPagar'])) {
                                        print "<span style='color:red'> <-- ¡No has introducido nungún concepto correcto!</span>";
                                    }
                                    ?>
                                    <br /><br />
                                    <label for="cantidadPagar">Cantidad:</label>
                                    <input type="text" name="cantidadPagar" id="cantidadPagar" value="<?php
                            if (isset($_REQUEST['enviarPagar']) && $errorCantidad == FALSE) {    // si volvemos a acceder y pusimos bien la cantidad,
                                echo $_REQUEST['cantidadPagar'];            // mostramos la que escribimos
                            }
                                    ?>"/>

                                           <?php
                                           if ((empty($_REQUEST['cantidadPagar']) || $errorCantidad) && isset($_REQUEST['enviarPagar'])) {
                                               print "<span style='color:red'> <-- ¡No has introducido nunguna cantidad correcta!</span>";
                                           }
                                           ?><br /><br />
                                    <input type="submit" id="enviarPagar" name="enviarPagar" value="Pagar" />
                                </fieldset>
                                <span style="color:red"><pre>/|\                                          /|\
                            |         ¡Algún dato incorrecto!            |</pre></span>

                                    <?php
                                    ?>
                            </div>


                                    <?php
                                    
                                } else {              // si hicimoes bien el pago, añadimos el pago al array calculado el saldo y nos vamos a movimientos mostreandolo
                                    
                                    // -----------    AÑADIMOS AL VECTOR -------------------------
                                    // con los datos validados de la operación pagar y llamamdo a la función Calcular_Saldo_Contable creamos un array 
                                    // que añadiremos al array datos
                                    $nuevoSaldo = Calcular_Saldo_contable($saldo, $_REQUEST['cantidadPagar'] * (-1)); /* calculamos el nuevo saldo, multiplicamos por -1
                                     * para que sea negativo */

                                    $nuevoMovimiento = array($_REQUEST['fechaPagar'], $_REQUEST['conceptoPagar'], $_REQUEST['cantidadPagar'] * (-1), $nuevoSaldo);

                                    array_push($datos, $nuevoMovimiento);

                                    //---------- MOSTRAMOS  -----------------------------
                                    ?> 
                            <script>alert("Pago realizado con éxito")</script>   <!-- notificamos la realización correcta del pago  -->

                            <?php
                            mostrar_Movimientos($datos);
                        }
                    } else {

                        

                        // BOTON DEVOLVER (enviarDevolver)  ///////////////////////////////////////////////////////////////////////////////////////////////

                        

                        if (isset($_REQUEST['enviarDevolver'])) {

                             if (empty($_REQUEST['ultMov'])) {
                                ?><div class="operaciones" id="devolver">
                                    <h1>Devolver Recibos</h1>
                                    <fieldset>
                                        <legend>Recibos, escoga uno</legend>
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
                                                
                                                $datosInvertidos = array_reverse($datos);     /* le damos la vuelta al vector para imprimir los movimientos
                                                                                            *  del mas nuevo al más viejo
                                                                                            */

                                                for ($i = 0; $i < $elementos; $i++) {
                                                    $pos = $i + 1;
                                                    if ($datosInvertidos[$i][2]<0) {        // este if es solo para mostrar los recibos, es decir saldos negativos
                                                        print "<tr><td><input type=\"radio\" name=\"ultMov\" value=\"$pos\" /></td>";
                                                        for ($j = 0; $j < 3; $j++) {                                     // imprimimos solo los 3 primeros elementos de cada movimiento,
                                                            print "<td>";
                                                            formatearNumero($datosInvertidos[$i][$j]);              //es decir no imprimimos el saldo en ese momento
                                                        }
                                                        print "</tr>";
                                                    }
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                        <span style="color:red"><pre>                    /|\                                                 /|\
                     |      ¡No has seleccionado ningún movimiento!      |</pre></span>
                                        <input type="submit" name="enviarDevolver" id="enviarDevolver" value="Devolver" />

                                    </fieldset>
                                </div>
                            <?php
                                /************************************************************************************************/
                            } else {
                                /************************************************************************************************/
                                 
                                $numElementos = count($datos);    /* sabiendo el número de elementos que tiene nuestro array datos y el elemento
                                 *  seleccionado, podemos hayar la posición del elemento en el array original restando a los elementos la posición
                                 * del elemento seleccionado en el array invertido
                                 */
                                
                                $numElementos - $_REQUEST['ultMov'];
                                $cantidadDevuelta = $datos[$numElementos - $_REQUEST['ultMov']][2];  /* cogemos el saldo devuelto 
                                                                                                    *  y se lo sumamos al saldo en el último movimiento
                                                                                                    */
                                $datos[$numElementos - 1][3] = $datos[$numElementos - 1][3] + $cantidadDevuelta*-1;  

                                unset($datos[$numElementos - $_REQUEST['ultMov']]);     // localizamos el movimiento seleccionado para ser eliminado
                                
                                $datos = array_values($datos);      // con esto conseguimos que se reoganicen las claves de nuevo
                                
                                ?> 
                            <script>alert("Devolución realizada con éxito")</script>   <!-- notificamos la realización correcta de la devolución -->

                                <?php

                                    mostrarDevolución($datos);
                                 
                             }
                        }
                    }
                }
            }
        }
    }
}
?>
<!-- ***************   caja que nos mostrará la sección de Bienvenida *************************** -->

                    <div id="inicio">
                        <h1>Bienvenido</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>
                    </div>
                            <!-- input del formulario de tipò hidden con la serialización del array multidimensional con la información
                            de los movimientos, la codificación se la hacemos al value para no tener problemas con los caractares especiales,
                            ya que la serialización nos introduce algunos de ellos -->
                    <input type="hidden" name="datosOcultos" value="<?php echo base64_encode(serialize($datos)) ?>" /> 
                </div>
            </section>
        </form>
    </body>   <!-- Cerramos HTML -->
</html>