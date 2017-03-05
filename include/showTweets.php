<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Twitter {
    
    public function getTweets() {
        
        require_once 'TwitterAPIExchange.php';

        $settings = array(          // introducimos todas nuestras variables para acceder
            'oauth_access_token' => "623186846-JesHAJNhYyENgEn0mehqxbhEezgXHjJhUuGoNDg6", 
            'oauth_access_token_secret' => "8yEgvbJrlaSUxDwO8Gdmisrm5cGqRxiUWbBjiRwFdV2m2",
            'consumer_key' => "0tbejMFz4uDeVs8qMhcidMhfp",
            'consumer_secret' => 'Ber84U52EzITKvQa1pcCpGIb9lmBR4c0ETbCvAOuxVMEnCNwVZ'
        );
        
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=Natxoss&count=3';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();  
        
        // hacemos la petición a traves de la libreria TwitterAPIExchange.php y recibmos el JSON
        
        return $json;
    }
    
    public function getArrayTweets($jsoraw) {
        
        $array = json_decode($jsoraw);      // lo convertimos a un objeto php
        $datos;
        $num_items = count($array);     // contamos los elementos que contiene

        for ($i=0; $i<$num_items; $i++) {   /* y los recorremos para hacer un array de dos dimensiones con 
                                            *  la información que necesitamos de cada tweet */
            $user = $array[$i]; // 

            $fecha = $user->created_at;     // fecha de creación del tweet
            $url_imagem = $user->user->profile_image_url;  // imagen de perfil
            
            $screen_name = $user->user->screen_name;    // nombre de perfil
            $screen_name = "<a href='https://twitter.com/".$screen_name."' target='_black'>@".$screen_name."</a>";  // le ponemos el enlace a su perfil
            
            $tweet = $user->text;   // texto del tweet
            
            $datos[$i][0] = $fecha;
            $datos[$i][1] = $url_imagem;
            $datos[$i][2] = $screen_name;
            $datos[$i][3] = $tweet;

            
                                            // Si el tweet es un retweet de otro usuario mostramos el enlace a su perfil y su imagen
            if (isset($user->retweeted_status)) {
                $screen_name_autor = $user->retweeted_status->user->screen_name;
                $screen_name_autor = "<a href='https://twitter.com/".$screen_name_autor."' target='_black'>@".$screen_name_autor."</a>";
                $datos[$i][4] = $screen_name_autor;
                
                $imagen_autor = $user->retweeted_status->user->profile_image_url;
                $datos[$i][5] = $imagen_autor;
            }
        }
        return $datos;
    }
    
    public function displayTweet($rawdata) {
        
        setlocale(LC_ALL,"es_ES.UTF-8");
                                                // hacemos un for para mostrar los 3 tweet's
        for ($i=0; $i<count($rawdata); $i++) {
            echo '<div class="col s12 m4 center" id="'.($i+1).'">';
            echo '  <div class="card grey lighten-5 z-depth-1">';
            
                    /* hacemos lo siguiente para pasar la fecha que nos entrega la API de twitter a formato UNIX y poder trabajar
                    * con ella como mejor nos convenga */
            
            $horaFecha = explode(" ", $rawdata[$i][0]);  // separamos la cadena de la fecha de la API
            $fecha = explode(":", $horaFecha[3]);       // y separamos las horas minutos y segundos
            $hora = (int)$fecha[0];
            $min = (int)$fecha[1];
            $seg = (int)$fecha[2];
            
            $fechaUnix = mktime($hora,$min,$seg, $this->hallarMes($horaFecha[1]), $horaFecha[2], $horaFecha[5]);   // la pasamos a formato UNIX
            
                // y la traducimos a formato local a nuestro gusto
            $horaFecha = strftime("%A", $fechaUnix).", ".  strftime("%d de ", $fechaUnix). ucfirst(strftime("%B del %Y", $fechaUnix)." a las ".  strftime("%T", $fechaUnix));
            
            echo '      <div class="card-content"><span class="card-title">'.$horaFecha.'</span>';      // mostramos la fecha y hora del tweet
            
            
                                                // con esto estamos averiguando si es un retweet o no 
            if (count($rawdata[$i]) > 4) {
                echo '          <p><img class="circle responsive-img" src="'.$rawdata[$i][5].'" /><br />';  // si lo es mostramos la imagen del autor
            } else {
                echo '          <p><img class="circle responsive-img" src="'.$rawdata[$i][1].'" /><br />';  // si no la mia
            }
            echo               $rawdata[$i][3].'</p>';  // el texto del tweet
            echo '</div><div class="card-action">';
                                            // dependiendo de si es retweet mostramos el nombre del autor o el nuestro
            if (count($rawdata[$i]) > 4) {
                echo $rawdata[$i][4];
            } else {
                echo $rawdata[$i][2];
            }

            echo '</div></div></div>';
        }
    }
            // función para mostrar la cabecera de la sección de los últimos tweets
    
    public function mostrarCabecera($rawdata) {
        
        echo '<div class="chip"><img src="'.$rawdata[0][1].'" alt="" />'.$rawdata[0][2].'</div><h5> Mis últimos Tweet\'s</h5><div class="divider"></div> ';
    }
    
        // switch para sacar el mes en numero con las 3 letras que nos da twitter
    
    public function hallarMes($mesText) {
        
        switch ($mesText) {
            case "Jan":
                return 1;

                break;
            case "Feb":
                return 2;

                break;
            case "Mar":
                return 3;

                break;
            case "Apr":
                return 4;

                break;
            case "May":
                return 5;

                break;
            case "Jun":
                return 6;

                break;
            case "Jul":
                return 7;

                break;
            case "Aug":
                return 8;

                break;
            case "Sep":
                return 9;

                break;
            case "Oct":
                return 10;

                break;
            case "Nov":
                return 11;

                break;
            case "Dec":
                return 12;

                break;

            default:
                break;
        }
    }
}

