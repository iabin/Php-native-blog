<?php   
    require '../../functions/autoload_class.php';
     require '../../functions/inSession.php';
     $id = isset($_GET['id']) ? 
        $_GET['id'] :false;
     if(!$id)   
        header('location: ../tablaPost.php?message=No se pudo identificar el id&type=dangerMessage');

   if(isset($_POST['enviar'])){
        $categoria = $_POST['categoria'] ?? '';
        $usuario = $session->getValue('id');
        $titulo = $_POST['tittle'] ?? '';
        $contenido = $_POST['contenido'] ?? '';
        $imagen = $_POST['image'] ?? '';
        $cate = '';
        if(empty($titulo) or empty($contenido) or empty($categoria)){
            header('location: ../postear.php?message=EL titulo y contenido no pueden ser vacios&type=warningMessage');
        }else {
        foreach ($categoria as $selectedOption){
             $cate .= " ".$selectedOption;
        }

        $articulo = new Article(new Conexion);
        $articulo->setCategoria($cate);
        $articulo->setUsuario($usuario);
        $articulo->setTitulo($titulo);
        $articulo->setContenido($contenido);
        $articulo->setImagen($imagen);
        $articulo->setId($id);
        $row = $articulo->actualizarArticulo();
        echo $row;
        if($row){    
            header("location: ../tablaPost.php?message=Articulo actualizado Correctamente&type=successMessage");
        }else{
           header('location: ../edit.php?message=No se pudo actualizar&type=dangerMessage');
            }
        }
    }else {
        echo "No entraste correctamente";
    }
     

?>