<?php

class manejadorDeArchivos{

    public static function guardarDato($archivo,$dato){

        $lista=manejadorDeArchivos::leer($archivo);
        array_push($lista,$dato);
        manejadorDeArchivos::guardarTodo($archivo,$lista);
        
    }

    public static function guardarTodo($archivo,$dato){

        $archivoGuardar= fopen($archivo,"w");
        $rta=fwrite($archivoGuardar, json_encode($dato));
        fclose($archivoGuardar);

    }

    public static function leerID($archivo,$identificador){

        $contenido= manejadorDeArchivos::leer($archivo);
        $respuesta=null;
        for($i=0;$i<count($contenido);$i++){        
            $value=$contenido[$i];
            if($value["id"] == $identificador){
                $respuesta=$value;
            }
        }
        return $respuesta;
    }

    public static function leer($archivo){

        $contenido=null;
        if(file_exists($archivo)){
            $arch=fopen($archivo,"r");
            $contenido = fread($arch,filesize($archivo));
            fclose($arch);
        }
        return json_decode($contenido,true);
    }

    public static function eliminar($archivo,$identificador){
 
        $array_aux=array();
        $rta=manejadorDeArchivos :: leer($archivo);
        foreach($rta as $value){
            if(!($value["id"]==$identificador)){
                array_push($array_aux,$value);
            }
        }
        manejadorDeArchivos::guardarTodo($archivo,$array_aux);
    }

    public static function reemplazar($archivo,$dato){

        $rta= manejadorDeArchivos:: leer($archivo);
        $encontro=false;
        for($i=0;$i<count($rta);$i++){        
            $value=$rta[$i];
            if($value["id"] == $dato->id){
                $rta[$i]=$dato; 
                $encontro=true;
            }
        }
        if(!$encontro){
            manejadorDeArchivos::guardarDato($archivo,$dato);
        }else{
            manejadorDeArchivos::guardarTodo($archivo,$rta);
        }
        
    }

    public static function creaArchivo($archivo){
    
        if(!file_exists($archivo)){
            $arch= fopen($archivo,"w");
            $aux=array();
            $rta=fwrite($arch, json_encode($aux));
            fclose($arch);
        }
    
    }






}