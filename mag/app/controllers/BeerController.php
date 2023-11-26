<?php
namespace App\Controllers;
require "../app/models/Beer.php";
use App\Models\Beer;


// ESTRUCTURA DE BD nombre, tipo, graduacion_alcoholica, pais, precio, ruta_imagen


class BeerController{
    function __construct(){
        //echo "<br>construyendo Uder controller ...";
    }

    function index(){ // crea el home
        $cervezas = Beer::all(); 
        require "../views/beer/index.php";
    }

    function show($args){ // muestra los detalles de cada cerveza apartir de la id
        $id = (int)$args[0];
        $beer = Beer::find($id);
        require "../views/beer/show.php";
    }

    function create(){ // lanza el formuario para meter los datos
        require "../views/beer/create.php";
      
    }
    // funcion para guardar
    function store(){
        $beer = new Beer();  
        $beer->nombre = $_REQUEST["nombre"];
        $beer->tipo = $_REQUEST["tipo"];
        $beer->graduacion_alcoholica = $_REQUEST["graduacion_alcoholica"];
        $beer->pais = $_REQUEST["pais"];
        $beer->precio = $_REQUEST["precio"];
         
        // tratar la imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $ruta_destino = 'C:/xampp/htdocs/mag/public/images/'; // Ruta donde guardarás las imágenes en caso de windows 
            $nombre_imagen = $_FILES['imagen']['name'];
            $ruta_temporal = $_FILES['imagen']['tmp_name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamano_imagen = $_FILES['imagen']['size']; // esto muestra el tamaño de la imagen
        
            // el tipo de imagen permitido
            $formatoImg = ['image/jpeg', 'image/png']; 
            $extension_permitida = ['jpg', 'jpeg', 'png'];
        
            $extension = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
        
            if (in_array($tipo_imagen, $formatoImg) && in_array($extension, $extension_permitida)) {
                // Verificar el tamaño del archivo (10 MB = 10 * 1024 * 1024 bytes)
                $tamano_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        
                if ($tamano_imagen <= $tamano_maximo) {
                    // si todo va bien lo lleva a ubicacion
                    if (move_uploaded_file($ruta_temporal, $ruta_destino . $nombre_imagen)) {
                        $beer->ruta_imagen = '/images/' . $nombre_imagen; // guarda la ruta en la base de datos
                    } else { // error en el movimiento
                        echo "Error al mover el archivo.";
                        
                    }
                } else { // error el tamaño es demasiado grande 
                    echo "El tamaño del archivo es demasiado grande. Sube una imagen de hasta 10 MB.";
                }
            } else { // error no es el formato permitido
                echo "Tipo de archivo no permitido. Sube una imagen JPEG o PNG.";
            }
        }        
        // tratar documento (PDF o DOCX)
        if ($_FILES['documento']['error'] === UPLOAD_ERR_OK) {
            $ruta_destino_documento = 'C:/xampp/htdocs/mag/public/documents/'; // ruta donde guardar documentos
            $nombre_documento = $_FILES['documento']['name'];
            $ruta_temporal_documento = $_FILES['documento']['tmp_name'];
            $tipo_documento = $_FILES['documento']['type'];
    
            // tipo de documento permitido
            $tipoDocumento = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']; // Tipos MIME permitidos para documentos
            $extensionDocumento = ['pdf', 'docx'];
    
            $extension_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION));
    
            if (in_array($tipo_documento, $tipoDocumento) && in_array($extension_documento, $extensionDocumento)) {
                $tamanio_maximo = 10 * 1024 * 1024; // tamaño permitido 10 MB
    
                if ($_FILES['documento']['size'] <= $tamanio_maximo) {
                    if (move_uploaded_file($ruta_temporal_documento, $ruta_destino_documento . $nombre_documento)) { // lo mueve
                        $beer->ruta_documento = '/documents/' . $nombre_documento; // Guarda la ruta relativa del documento en la base de datos
                    } else {
                        echo "Error al mover el archivo de documento.";// error al mover
                    }
                } else {
                    echo "El tamaño del documento excede el límite de 10 MB.";// error de tamaño
                }
            } else {
                echo "Tipo de archivo de documento no permitido. Sube un PDF o DOCX.";// error de formato
            }
        } else {
            echo "Error al subir el archivo de documento.";// error al subir
        }
        $beer->insert();
        header("Location:/beer");
    }
    // funcion para editar 
    function edit($args){
        $id = (int)$args[0];
        $beer = Beer::find($id);
        require "../views/beer/edit.php";
    }
    // funcion para actulizar
    function update(){
        $id = $_REQUEST["id"];
        $beer = Beer::find($id);
        $beer->nombre = $_REQUEST["nombre"];
        $beer->tipo = $_REQUEST["tipo"];
        $beer->graduacion_alcoholica = $_REQUEST["graduacion_alcoholica"];
        $beer->pais = $_REQUEST["pais"];
        $beer->precio = $_REQUEST["precio"];
    
        // tratar de la imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $ruta_destino_imagen = 'C:/xampp/htdocs/mag/public/images/'; 
            $nombre_imagen = $_FILES['imagen']['name'];
            $ruta_temporal_imagen = $_FILES['imagen']['tmp_name'];
            $tipo_imagen = $_FILES['imagen']['type'];
    
            //tipo de imagen permitido
            $tipoImagen = ['image/jpeg', 'image/png']; 
            $extensionImagen = ['jpg', 'jpeg', 'png']; 
    
            $extension_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
    
            if (in_array($tipo_imagen, $tipoImagen) && in_array($extension_imagen, $extensionImagen)) {
                
                if (move_uploaded_file($ruta_temporal_imagen, $ruta_destino_imagen . $nombre_imagen)) {
                    $beer->ruta_imagen = '/images/' . $nombre_imagen; 
                } else {
                    echo "Error al mover el archivo de imagen.";
                }
            } else {
                echo "Tipo de archivo de imagen no permitido. Sube una imagen JPEG o PNG.";// error de formato
            }
        }
        $beer->save();
        header("Location: /beer");
    }
    // funcion para borrar por id 
    function delete($args) {
        $id = (int)$args[0];
        $beer = Beer::find($id);
        $beer->delete();
        header("Location:/beer");
    }

    
}//fin de clase