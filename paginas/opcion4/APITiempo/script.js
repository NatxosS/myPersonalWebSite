var misCoordenadas;
var ubicacion;

    function initMap() {

            // creamos el objeto mapa y lo mostramos en el elemento html mapa

            var map = new google.maps.Map(document.getElementById('mapa'), {
                center: misCoordenadas,
                scrollwheel: true,
                zoom: 12
            });

                    // creamos la marca en el mapa

            var marca = new google.maps.Marker({
                map: map,
                position: misCoordenadas,
                title: 'El tiempo en'
            });

            marca.setMap(map);
        }


$(function () {

    
       
            // ---------------   **  BOTÓN TIEMPO HOY  **  --------------------- //

        $("#hoy").click(function (evt) {
            evt.preventDefault();           // detenemos el envío del formulario
            
            var localidad = "";
            localidad = $("#localidad").val();          // cogemos el valor introducido de localidad y comprobamos que no este vacio
            
            if (localidad == "") {                                  // en caso contrario mostramos mensaje de error
                alert("Debes introducir una localidad");
            } else {

                $("#cajaHoy").html("<div class='preloader-wrapper small active'><div class='spinner-layer spinner-green-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>"); 
                  // mientras se carga mostramos el gif de carga

                        // $.get es el método que realiza la petición de ajaxTiene dos parámetros
                var url = "http://api.openweathermap.org/data/2.5/weather?q="+localidad+",es&units=metric&APPID=ffb471df7d035f86794800527efbb79c&lang=es";        

                $.get(url, function (datosDevueltos, estado) {

                    if (estado == "success") {

                        var cadena = "Localidad: "+ datosDevueltos.name +"<br />"; 
                        cadena += "<img src='http://openweathermap.org/img/w/"+ datosDevueltos.weather[0].icon +".png' /><br />";
                        cadena += "Temperatua: "+ datosDevueltos.main.temp +"º<br/>";
                        cadena += "Humedad: "+ datosDevueltos.main.humidity +" %<br/>";
                        cadena += "Velocidad del viento: "+ datosDevueltos.wind.speed +" m/s<br/>";
                        cadena += "Tiempo: "+ datosDevueltos.weather[0].description +"<br/>";
                        cadena += "Nubosidad: "+ datosDevueltos.clouds.all +" %<br/>";

                        $("#cajaHoy").html(cadena);

                        misCoordenadas = {lat: datosDevueltos.coord.lat, lng: datosDevueltos.coord.lon};

                        ubicacion = "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDacYrZoRhw9EoqIEOpJwAts2X43LOOS0Q&callback=initMap' ></script>";

                        $("#mapa").html(ubicacion);
                    }
                });
            }
        });

            // ---------------   **  BOTÓN TIEMPO MAÑANA  **  --------------------- //
        
        $("#manana").click(function (evet) {
                evet.preventDefault();           // detenemos el envío del formulario
                
                var localidad = "";
                localidad = $("#localidad").val();
            
                if (localidad == "") {
                    alert("Debes introducir una localidad");
                } else {

                    $("#cajaManana").html("<div class='preloader-wrapper small active'><div class='spinner-layer spinner-green-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>");   // mientras se carga mostramos el gif de carga

                            // $.get es el método que realiza la petición de ajaxTiene dos parámetros
                    var url = "http://api.openweathermap.org/data/2.5/forecast?q="+localidad+",es&mode=json&units=metric&cnt=2&appid=ffb471df7d035f86794800527efbb79c&lang=es";        

                    $.get(url, function (datosDevueltos, estado) {

                        if (estado == "success") {

                            var cadena = "Localidad: "+ datosDevueltos.city.name +"<br />";
                            cadena += "<img src='http://openweathermap.org/img/w/"+ datosDevueltos.list[0].weather[0].icon +".png' /><br />";
                            cadena += "Temperatua mínima: "+ datosDevueltos.list[1].main.temp_min +"º<br />";
                            cadena += "Temperatura máxima: "+ datosDevueltos.list[1].main.temp_max +"º<br />";

                            $("#cajaManana").html(cadena);
                            
                            misCoordenadas = {lat: datosDevueltos.city.coord.lat, lng: datosDevueltos.city.coord.lon};

                        ubicacion = "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDacYrZoRhw9EoqIEOpJwAts2X43LOOS0Q&callback=initMap' ></script>";

                        $("#mapa").html(ubicacion);

                            $("#mapa").html(ubicacion);
                        }
                    });
                }
            }) ;
            
            // ---------------   **  BOTÓN POR UBICACIÓN  **  --------------------- //

                    /* Al hacer clic en este botón automáticamente mostramos el mapa con nuestra ubicación, 
                     * el tiempo actual y el tiempo de mañana */

            $("#conUbicacion").click(function (evento) {
                evento.preventDefault();  // paramos el envio del formulario

                if (navigator.geolocation) {        // si esta activada la geolocalización llevamos a cabo nuestra tarea

                    $("#mapa").html("<div class='preloader-wrapper small active'><div class='spinner-layer spinner-green-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>");   // mientras se carga mostramos el gif de carga

                    //guardamos el objeto geolocation en una variable

                    var migeo = navigator.geolocation;
                    var latitud; 
                    var longuitud;

                    /* creamos la variable que guardará las coordenadas a traves de la función getCurrentPosition del objeto geolocation
                    * al cual se le pasa una función anónima que recibira las coordenadas en un objeto al que llmaremos posición*/

                    var coordenadas = migeo.getCurrentPosition(function (posicion) {

                        latitud = posicion.coords.latitude;
                        longuitud = posicion.coords.longitude;

                        // ------------- mostramos el tiempo de hoy -------

                        $("#mapa").html("<div class='preloader-wrapper small active'><div class='spinner-layer spinner-green-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>"); 
                  // mientras se carga mostramos el gif de carga

                        // $.get es el método que realiza la petición de ajaxTiene dos parámetros
                        var url = "http://api.openweathermap.org/data/2.5/weather?lat="+latitud+"&lon="+longuitud+"&units=metric&APPID=ffb471df7d035f86794800527efbb79c&lang=es";        

                        $.get(url, function (datosDevueltos, estado) {

                            if (estado == "success") {

                                $("#localidad").val(datosDevueltos.name);

                                var cadena = "Localidad: "+ datosDevueltos.name +"<br />"; 
                                cadena += "<img src='http://openweathermap.org/img/w/"+ datosDevueltos.weather[0].icon +".png' /><br />";
                                cadena += "Temperatua: "+ datosDevueltos.main.temp +"º<br/>";
                                cadena += "Humedad: "+ datosDevueltos.main.humidity +" %<br/>";
                                cadena += "Velocidad del viento: "+ datosDevueltos.wind.speed +" m/s<br/>";
                                cadena += "Tiempo: "+ datosDevueltos.weather[0].description +"<br/>";
                                cadena += "Nubosidad: "+ datosDevueltos.clouds.all +" %<br/>";

                                $("#cajaHoy").html(cadena);

                                misCoordenadas = {lat: datosDevueltos.coord.lat, lng: datosDevueltos.coord.lon};

                                var ubicacion = "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDacYrZoRhw9EoqIEOpJwAts2X43LOOS0Q&callback=initMap' ></script>";

                                $("#mapa").html(ubicacion);

                            }
                        });

                        var url = "http://api.openweathermap.org/data/2.5/forecast?lat="+latitud+"&lon="+longuitud+"&mode=json&units=metric&cnt=2&appid=ffb471df7d035f86794800527efbb79c&lang=es";        

                        $.get(url, function (datosDevueltos, estado) {

                            if (estado == "success") {

                                var cadena = "Localidad: "+ datosDevueltos.city.name +"<br />";
                                cadena += "<img src='http://openweathermap.org/img/w/"+ datosDevueltos.list[0].weather[0].icon +".png' /><br />";
                                cadena += "Temperatua mínima: "+ datosDevueltos.list[1].main.temp_min +"º<br />";
                                cadena += "Temperatura máxima: "+ datosDevueltos.list[1].main.temp_max +"º<br />";

                                $("#cajaManana").html(cadena);
                            }
                        });
                    });

                    
                } else { // no tienes activada la geolocalización, informamos
                    alert("No has dado permisos de geolocalización");
                }
            });
    
});
