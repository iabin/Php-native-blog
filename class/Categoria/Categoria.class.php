<?php 
class Categoria{
    private $con;
    public $name;
    public $id;
    
    public function __construct(Conexion $con){
        $this->con = $con;
    }

     public function constructorConId($i){
        $query = "SELECT * FROM categoria WHERE categoria_id = '$i'";
        $res = $this->con->query($query);      
        $row = $res->fetch_array(MYSQLI_ASSOC);
        $this->name = $row['categoria'];  
        $this->id = $i;
    }

     public function setName(string $name){
        $this->name = $this->con->real_escape_string($name);
        $this->name = ucwords($this->name);
    }

    public function cargarCategoria():bool {
        $query = "INSERT INTO `categoria`(`categoria`) VALUES ('$this->name')";
        $res = $this->con->query($query);    
        
        if ($res){
            return true;
        }
        return false;  
    }

    public function verCategorias(){
        $query = "SELECT * FROM `categoria`";
        $res = $this->con->query($query);
        $categorias = '';
        $cate = '';
        while($row = $res->fetch_array(MYSQLI_ASSOC)){
            $categorias .= "<option value='$row[categoria_id]'>$row[categoria]</option>";
            
        }
        return $categorias;
    }

     public function borrarCategoria():bool {
        $query = "INSERT INTO `categoria`(`nombre`) VALUES ('$this->name')";
        $res = $this->con->query($query);    
        
        if ($res){
            return true;
        }
        return false;  
    }

    public function listaPlana(int $comoElla){
         $query = "SELECT * FROM `categoria`";
        $res = $this->con->query($query);
        $fila1 =  '';
        $i = 0;
        while(($i < $comoElla)&&($row = $res->fetch_array(MYSQLI_ASSOC))){
        
        $fila1 .= "<li><a href='categoria.php?id=".$row['categoria_id']."'>".$row['categoria']."</a> </li>";
        $i++;
        }
        return $fila1."<li class=''><a class='btn-success' href='allCategorias.php'>Ver todas las categorias</a> </li>";  
    }

    public function categoriaAtabla(){
        $query = "SELECT * FROM `categoria`";
        $res = $this->con->query($query);
        $categorias = '';
        
        
        while($row = $res->fetch_array(MYSQLI_ASSOC)){
            $categorias .="<a href='categoria.php?id=".$row['categoria_id']."' class='list-group-item'>".$row['categoria']."</a>";
        }
        return $categorias;
    }

    public function listarCategorias(){
        $limite  = 0;
        $query = "SELECT * FROM `categoria`";
        $res = $this->con->query($query);
        $fila1 =  '';
        $fila2 =  '';
        $interFila = "</ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class='col-lg-6'>
                            <ul class='list-unstyled'>";
        $fila = true;
        while(($limite<17)&&($row = $res->fetch_array(MYSQLI_ASSOC))){
            $limite++;
            if ($fila) {
                $fila1 .= "<li><a href='categoria.php?id=".$row['categoria_id']."'>".$row['categoria']."</a> </li>";
                $fila = false;
            } else {
                $fila2 .= "<li><a href='categoria.php?id=".$row['categoria_id']."'>".$row['categoria']."</a> </li>";
                $fila = true;
            }
        }
        return $fila1.$interFila.$fila2."<li class=''><a class='btn-success' href='allCategorias.php'>Ver todas las categorias</a> </li>"; 
    }


    public function articulosCategoria(){
        $query="select * from articulo	where categoria_id like '%$this->id%'";
        $res = $this->con->query($query);
        $categorias = '';
        $cate = '';
        while($row = $res->fetch_array(MYSQLI_ASSOC)){
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $nombreCategoria = '';
            $arreglo = explode(" ", $row['categoria_id']);
            foreach ($arreglo as $value) {
                if(empty($value))
                    continue;
                $categoria = new Categoria(new Conexion());
                $categoria->constructorConId($value);
                $nombreCategoria .= " | <a href='../blog/categoria.php?id=$categoria->id'>$categoria->name</a>";
            }

        
            $usuario = new Usuario(new Conexion,$row['usuario_id']);
            $nombre = $usuario->nombre;
            $fecha = new DateTime($row['fecha']);
            $fechaEs = $dias[$fecha->format('w')]." ".$fecha->format('d')." de ".$meses[$fecha->format('n')-1]. " del ".$fecha->format('Y') ;

            $categorias .= "<tr>";
            $categorias .= "<td><a href='../blog/post.php?id=".$row['articulo_id']."'>".$row['titulo']."</a></td>";
            $categorias .= "<td>".$nombre."</td>";
            $categorias .= "<td>".$nombreCategoria."</td>";
            $categorias .= "<td>".$fechaEs."</td>";
            $categorias .= "</tr> ";
            $cate = $categorias.$cate;
            $categorias = '';
        }
        return $cate;


    }

}

?>