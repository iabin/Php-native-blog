<?php  
    require '../../functions/autoload_class.php';
    $session = new Session();
    if(!$session->validateSession('usuario'))
        header('location: ../login/login.php?message=Para ver el panel de administrador, debes inciar sesión >:v&type=warningMessage');

  
    

    if(isset($_POST['enviar'])){
        $categoria = $_POST['categoria'] ?? '';
        $usuario = $session->getValue('id');
        $titulo = $_POST['tittle'] ?? '';
        $contenido = $_POST['contenido'] ?? '';
        $imagen = $_POST['image'] ?? '';
        $cate = '';
        if(empty($titulo) or empty($contenido)){
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
        $row = $articulo->cargarArticulo();
        if($row){    
            header("location: ../tablaPost.php?message=Articulo agregado Correctamente&type=successMessage");
        }else{
           header("location: ../postear.php?message=No se pudo guardar el post&type=dangerMessage");

            }
        }
    }else {
        echo "no se hizo nada";
    }
     

?>