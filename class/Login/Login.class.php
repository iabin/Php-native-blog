<?php 
class Login{
    private $con;
    public $email;
    public $password;
    

    public function __construct(Conexion $con){
        $this->con = $con;
    }
    public function setEmail(string $email){
        $this->email = $this->con->real_escape_string($email);
    }

     public function setPassword(string $password){
        $this->password = $password;
    }

    public function signIn () {
        $query = "SELECT * FROM usuario WHERE email = '$this->email'";
        $res = $this->con->query($query);    
        
        if ($this->con->affected_rows > 0){
            $row = $res->fetch_array(MYSQLI_ASSOC);
            if(password_verify($this->password,$row['password']))
            return $row;
        }
        return $false;  
    }
}

?>