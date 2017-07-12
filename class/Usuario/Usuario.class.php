<?php 
class Usuario{
    private $con;
    public $nombre;
    public $correo;
    public $descripcion;

    public function __construct(Conexion $con,int $i){
        $this->con = $con;
        $query = "SELECT * FROM usuario WHERE usuario_id = '$i'";
        $res = $this->con->query($query);      
        $row = $res->fetch_array(MYSQLI_ASSOC);
        $this->nombre = $row['nombre'];
        $this->email = $row['email'];  
        $this->descripcion = $row['descripcion'];
    }

    

}

?>