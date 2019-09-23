
<?php
header('Access-Control-Allow-Origin: *');

$_METODO=$_SERVER["REQUEST_METHOD"];
$_ARCHIVO="archivo.json";
include "./manejadorDeArchivos.php";
include "./productos.php";

switch($_METODO){

    case "GET":{
        //echo "Metodo GET <br/>";
        manejadorDeArchivos :: creaArchivo($_ARCHIVO);
        $rta=null;
        if(isset($_GET["identificador"])){
            $rta= manejadorDeArchivos :: leerID($_ARCHIVO,$_GET["identificador"]);
        }else{
            $rta= manejadorDeArchivos::leer($_ARCHIVO);
        }
        echo json_encode($rta);
        break;   
    }

    case "POST":{
        
        
        if(isset($_POST["operacion"]))
        {
            $_OPERACION=$_POST["operacion"];
            switch($_OPERACION){

                case "POST":
                    echo "Metodo POST <br/>";
                    if(isset($_POST["id"]) && isset($_POST["nombreProducto"])){
                        $producto= new Producto($_POST["id"],$_POST["nombreProducto"],$_POST["marca"],$_POST["precio"],$_POST["dietetico"]);
                    }
                    if(isset($_FILES["imagen"])){
                        $extencion= $_FILES["imagen"]["type"]; 
                        $extFinal= preg_split ("[/]", $extencion);
                        $nombreNuevo = "./imagenes/".$_POST["id"].".". $extFinal[1];
                        $rta= move_uploaded_file($_FILES["imagen"]["tmp_name"],$nombreNuevo);
                        $producto->imagen=$_POST["id"].".". $extFinal[1];
                    }
                    manejadorDeArchivos::guardarDato($_ARCHIVO,$producto);
                break;

                case "PUT": //reemplaza
                    echo "Metodo PUT <br/>";
                    
                    if(isset($_POST["id"]) && isset($_POST["nombreProducto"])){
                        $producto= new Producto($_POST["id"],$_POST["nombreProducto"],$_POST["marca"],$_POST["precio"],$_POST["dietetico"]);
                    }
                    if(isset($_FILES["imagen"])){

                        $aReemplazar = manejadorDeArchivos::leerID($_ARCHIVO,$_POST["id"]);
                        $archivo_AUX="./imagenes/". $aReemplazar["imagen"];
                        if(file_exists($archivo_AUX)){
                            copy($archivo_AUX,"./backupImagenes/".$aReemplazar["imagen"]);
                            unlink($archivo_AUX);
                        }
                        $extencion= $_FILES["imagen"]["type"]; 
                        $extFinal= preg_split ("[/]", $extencion);
                        $nombreNuevo = "./imagenes/".$_POST["id"].".". $extFinal[1];
                        $rta= move_uploaded_file($_FILES["imagen"]["tmp_name"],$nombreNuevo);
                        $producto->imagen=$_POST["id"].".". $extFinal[1];
                    }  
                    manejadorDeArchivos::reemplazar($_ARCHIVO,$producto);     
                break;
                
                case "ELIMINAR":
                    echo "Metodo DELETE <br/>";
                    if(isset($_POST["id"])){
                        $aEliminar = manejadorDeArchivos::leerID($_ARCHIVO,$_POST["id"]);
                        var_dump($aEliminar);
                        manejadorDeArchivos::eliminar($_ARCHIVO, $_POST["id"]);
                        $archivo_AUX="./imagenes/". $aEliminar["imagen"];
                        if(file_exists($archivo_AUX)){
                            unlink($archivo_AUX); 
                        }
                    }
                break;

                case "PATCH":
                    echo "Metodo PATCH <br/>";
                        
                    if(isset($_POST["id"])){
                        $aModificar=manejadorDeArchivos::leerID($_ARCHIVO,$_POST["id"]);

                        if(isset($_POST["marca"])){
                            $aModificar["marca"] =$_POST["marca"];
                        }
                        
                        if(isset($_POST["nombreProducto"])){
                            $aModificar["nombreProducto"] = $_POST["nombreProducto"];
                        }
                        if(isset($_POST["precio"])){
                            $aModificar["precio"] = $_POST["precio"];
                        }
                        if(isset($_FILES["imagen"])){
                            if($aModificar["imagen"] != null){
                                $archivo_AUX="./imagenes/". $aModificar["imagen"];
                                if(file_exists($archivo_AUX)){
                                    copy($archivo_AUX,"./backupImagenes/".$aModificar["imagen"]);
                                    unlink($archivo_AUX);
                                }
                                $extencion= $_FILES["imagen"]["type"]; 
                                $extFinal= preg_split ("[/]", $extencion);
                                $nombreNuevo = "./imagenes/".$_POST["id"].".". $extFinal[1];
                                $rta= move_uploaded_file($_FILES["imagen"]["tmp_name"],$nombreNuevo);
                                $aModificar["imagen"]=$_POST["id"].".". $extFinal[1];
                            }
                            
                        }  

                    }
                    $producto= new Producto($aModificar["id"],$aModificar["nombreProducto"],$aModificar["marca"],$aModificar["precio"],$aModificar["dietetico"],$aModificar["imagen"]);
                    
                    manejadorDeArchivos::reemplazar($_ARCHIVO,$producto);     

                break;

                default:
                    echo "404 NOT FOUND";
                break;
            }
        }else{
            echo "debe setear el parametro operacion";
            
        }
        
    break; 
    }

    default:{
        var_dump($_SERVER);
    }
}


























































/**
 * ALEJANDRO LABORDE PARODI 
 * 
 */