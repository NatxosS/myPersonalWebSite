// author: Ignacio López Ballesteros

$(function () {
    
    if ($(window).width() < $(window).height()) {       // adaptamos la pantalla al tamaño actual del navegador
           $("#reloj").width($(window).width()- 40);
           $("#reloj").height($(window).width() - 40);
       } else {
           $("#reloj").width($(window).height() - 40);
           $("#reloj").height($(window).height() - 40);
       }
       
    var hora = new Date($.now()); // cogemos la hora actual 
    
    var minutos = hora.getMinutes();       // y rescatamos los minutos y segundos
    var segundos = hora.getSeconds();
    var horas = hora.getHours();
    
            // teniendo en cuenta que 360/60 = 6 grados son 1 segundo y que los 00 segundos son 270deg, 01 segundos son 276deg
    var gradosS = (segundos * 6 + 270);
    
    $("#segundero").css({                       // asignamos a la propiedad rotate los minutos y segundos hallados
        'transform': "rotate("+ gradosS +"deg)"
    });
    
    gradosM = (minutos * 6 + 270);
    
    $("#minutero").css({
        'transform': "rotate("+ gradosM +"deg)"
    });
    
    gradosH = (horas * 30 + 270);
    
    $("#hora").css({
        'transform': "rotate("+ gradosH +"deg)"
    });
    
    $.keyframe.define([{
            name: 'segundos',
            '0%': {
                'box-shadow': '10px 10px 10px black'   /* hacemos que la sombra se mueva teniendo en cuenta que la fuente 
 *                                                      * de luz estará fija arriba a la izquierda */
            },
            '25%': {
                'box-shadow': '10px 0px 10px black'
            },
            '50%': {
                'box-shadow': '-10px -10px 10px black'
            },
            '75%': {
                'box-shadow': '-10px 0px 10px black'
            },
            '100%': {
                'transform': 'rotate('+(gradosS + 360)+'deg)'
            }
        },{
            name: 'minutos',
            '0%': {
                'box-shadow': '10px 10px 10px black'   /* hacemos que la sombra se mueva teniendo en cuenta que la fuente 
 *                                                      * de luz estará fija arriba a la izquierda */
            },
            '25%': {
                'box-shadow': '10px 0px 10px black'
            },
            '50%': {
                'box-shadow': '-10px -10px 10px black'
            },
            '75%': {
                'box-shadow': '-10px 0px 10px black'
            },
            '100%': {
                'transform': 'rotate('+(gradosM + 360)+'deg)'
            }
        },{
            name: 'horas',
            '0%': {
                'box-shadow': '10px 10px 10px black'   /* hacemos que la sombra se mueva teniendo en cuenta que la fuente 
 *                                                      * de luz estará fija arriba a la izquierda */
            },
            '25%': {
                'box-shadow': '10px 0px 10px black'
            },
            '50%': {
                'box-shadow': '-10px -10px 10px black'
            },
            '75%': {
                'box-shadow': '-10px 0px 10px black'
            },
            '100%': {
                'transform': 'rotate('+(gradosH + 360)+'deg)'
            }
    }]);
   
    $(window).resize(function() {                   // capturamos el evento resize para cambiar el tamaño del reloj
       if ($(this).width() < $(this).height()) {        // si cambia el tamaño de la ventana
           $("#reloj").width($(this).width() - 40);
           $("#reloj").height($(this).width() - 40);
       } else {
           $("#reloj").width($(this).height() - 40);
           $("#reloj").height($(this).height() - 40);
       }
    });
    
});

