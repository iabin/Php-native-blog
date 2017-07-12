<?php   
    require '../../functions/autoload_class.php';
     $session = new Session();
    if(!$session->validateSession('usuario'))
        header('location: ../login/login.php?message=Para ver el panel de administrador, debes inciar sesión >:v&type=warningMessage');

    if(isset($_POST['submit'])){
        $email = $_POST['email'] ?? '';
        $pass = $_POST['password'] ?? '';
        if(empty($email) or empty($pass)){
            header('location: login.php?message=Usuario o contraseña no introducidos&type=warningMessage');
        }else {
        $login = new Login(new Conexion);
        $login->setEmail($email);
        $login->setPassWord($pass);
        $row = $login->signIn();
        if($row){
            $session = new Session();
            $session->addValue('email',$row['email']);
            $session->addValue('id',$row['usuario_id']);
            $session->addValue('usuario',$row['nombre']);
            header('location: ../dashboard.php');
            echo $session->getValue('email');
        }else{
          
            header('location: login.php?message=usuario o contraseña incorrectos&type=warningMessage');

            }
        }
    }

?>