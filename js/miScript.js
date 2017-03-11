/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var nombre;     // creamos estas variables globales para usarlas en diferentes partes de este js
var email;
var texto;


$(function () {
    // llamamos al archivo PHP showTweets

    $.ajax({
        url: "include/mostrarTweets.php", // y los mandamos a esta URL
        dataType: "json",
        beforeSend: function () {
            $("#redSocial").html("<span class='blue-text text-darken-2'>Conectando con Twitter...   </span><div class='preloader-wrapper small active'><div class='spinner-layer spinner-green-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>");
        },
        error: function (data) {     // si hay algún fallo en el envio mostramos el mensaje de error
            $("#redSocial").html("<span class='red-text text-darken-2'>Error al conectar con Twitter"+data+"</span>");
        },
        success: function (result) {     // si el envio fue correcto
            $("#redSocial").html(result.data);
        }
    });

    $("#acepta").change(function () {                  // función que nos deshabilita el botón de enviar en función del checkbox 
        if ($(this).is(":checked")) {                     // de aceptación de registro datos
            $("#enviar").prop("disabled", false);
        } else {
            $("#enviar").prop("disabled", true);
        }
    });

    function validar() {         // nos valida el formulario (por segunda vez, ya que lo hacia el HTML) y nos recoge el valor de los campos

        var correcto = true;

        nombre = $("#nombre").val();
        email = $("#suEmail").val();
        texto = $("#texto").val();

        $("#enviar").prop("disabled", true);

        if (nombre.length < 3) {
            correcto = false;       // nombre mayor que 2 caracteres
        } else {
            var pos_arroba = email.indexOf("@");     // valida el email
            var pos_punto = email.lastIndexOf(".");
            if (pos_arroba < 1 || pos_punto < pos_arroba + 2 || pos_punto + 2 >= email.length) {
                correcto = false;
            } else {
                if (texto.length < 15) {     // texto de más de 15 caracterees
                    correcto = false;
                }
            }
        }

        return correcto;
    }


    $("#form").submit(function (evt) {  // capturamos el evento submit y lo detenemos
        evt.preventDefault();

        if (validar()) {

            var datos = $(this).serialize();  // si son validos los datos creamos un JSON con ellos
            $("#form").trigger("reset");

            $.ajax({
                url: "include/enviarContacto.php", // y los mandamos a esta URL
                type: "POST",
                data: datos,
                dataType: "json",
                beforeSend: function () {
                    $("#ultimaFila").html("<span class='blue-text text-darken-2'>Enviando...</span>");
                },
                error: function () {     // si hay algún fallo en el envio mostramos el mensaje de error
                    $("#ultimaFila").html("<span class='red-text text-darken-2'>Error al enviar los datos</span>");
                },
                success: function (result) {     // si el envio fue correcto
                    if (result.success) {   // si todo fue correcto
                        $("#ultimaFila").html("<span class='green-text text-darken-2'>" + result.data + "</span>");
                    } else {    // si hubo problemas al conectar en la base de datos
                        $("#ultimaFila").html("<span class='red-text text-darken-2'>Error al guardar en la base de datos</span>");
                    }

                }
            });
        } else {
            alert("Datos erroneos");
        }

    });

});
