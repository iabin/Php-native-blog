<?php 
    require '../functions/autoload_class.php';

    $session = new Session();
    if(!$session->validateSession('usuario'))
        header('location: /login/login.php?message=Para ver el panel de administrador, debes inciar sesión >:v&type=warningMessage');

    $session->destroySession();
     header('location: login/login.php?message=salida de sesión exitosa&type=successMessage');    
?>