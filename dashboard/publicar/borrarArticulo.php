<?php   
    require '../../functions/autoload_class.php';
     require '../../functions/inSession.php';
     $id = isset($_GET['id']) ? 
        $_GET['id'] :false;
     if(!$id)   
        header('location: ../tablaPost.php?message=No se pudo identificar el id&type=dangerMessage');

        $articulo = new Article(new Conexion);
        $articulo->constructorConId($id);
        $del = $articulo->borrarArticulo($id);
        if($del){    
            header('location: ../tablaPost.php?message=articulo eliminado correctamente&type=successMessage');
        }else{
           header('location: ../tablaPost.php?message=hubo un error al eliminar&type=dangerMessage');

            }
        
  
     

?>