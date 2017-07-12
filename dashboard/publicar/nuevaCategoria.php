<?php   
    require '../../functions/autoload_class.php';
     $session = new Session();
    if(!$session->validateSession('usuario'))
        header('location: ../login/login.php?message=Para ver el panel de administrador, debes inciar sesión >:v&type=warningMessage');


    if(isset($_POST['submit'])){
        $nuevaCategoria = $_POST['nuevaCategoria'] ?? '';
        if(empty($nuevaCategoria)){
            header('location: ../postear.php?message=No se puede insertar campos vacios&type=dangerMessage');
        }else {
        $categoria = new Categoria(new Conexion);
        $categoria->setName($nuevaCategoria);
        $row = $categoria->cargarCategoria();
        if($row){     
            header('location: ../postear.php?message=categoria agregada correctamente&type=successMessage');
        }else{
            header('location: ../postear.php?message=No se pudo insertar&type=dangerMessage');
            }
        }
    }else {
        echo "no se hizo nada";
    }

?>