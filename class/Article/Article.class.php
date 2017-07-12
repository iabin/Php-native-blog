    <?php 
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    
    class Article{
        private $con;
        public $categoria;
        public $usuario;
        public $titulo;
        public $contenido;
        public $fecha;
        public $imagen;
        public $id;

        
        public function __construct(Conexion $con){
            $this->con = $con;
        }

        public function constructorConId(int $i){
            $query = "SELECT * FROM articulo WHERE articulo_id = '$i'";
            $res = $this->con->query($query);      
            $row = $res->fetch_array(MYSQLI_ASSOC);
            $this->categoria = $row['categoria_id'];
            $this->usuario = $row['usuario_id'];
            $this->titulo = $row['titulo'];
            $this->contenido = $row['contenido'];  
            $this->fecha = $row['fecha'];
            $this->imagen = $row['img'];
            $this->id = $i;
        }

        public function setCategoria($valor){
            $this->categoria = $this->con->real_escape_string( $valor);
        }

        public function setUsuario($valor){
            $this->usuario =  $this->con->real_escape_string($valor);
        }

        public function setTitulo($valor){
            $this->titulo =  $this->con->real_escape_string($valor);
        }

        public function setContenido($valor){
            $this->contenido =  $this->con->real_escape_string($valor);
        }

        public function setFecha($valor){
            $this->fecha =  $this->con->real_escape_string($valor);
        }

        public function setImagen($valor){
            $this->imagen =  $this->con->real_escape_string($valor);
        }
        
        public function setId($id){
            $this->id = $id;
        }

        public function cargarArticulo() {
            $query = "INSERT INTO `articulo`(`categoria_id`, `usuario_id`, `titulo`, `contenido`, `fecha`, `img`) VALUES ('$this->categoria','$this->usuario','$this->titulo','$this->contenido','".date("Y-m-d H:i:s")."','$this->imagen')";
            $res = $this->con->query($query);    
            if ($res){
                return $res;
            }
            return false;      
        }

        public function actualizarArticulo(){
            $query = "UPDATE `articulo` SET `categoria_id`='$this->categoria',`usuario_id`='$this->usuario',`titulo`='$this->titulo',`contenido`='$this->contenido',`fecha`='".date("Y-m-d H:i:s")."',`img`='$this->imagen' WHERE articulo_id='$this->id'";
            $res = $this->con->query($query);    
            
            if ($res){
                return $res;
            }
            return false;            
        
        }

        public function borrarArticulo(int $id){
            $query = "DELETE FROM `articulo` WHERE articulo_id='$id'";
            $res = $this->con->query($query);
            return $res;
        }

        public function articulosIndex(){
            $query = "SELECT * FROM `articulo` ORDER BY fecha DESC";
            $res = $this->con->query($query);
            $categorias = '';
            
            
            while($row = $res->fetch_array(MYSQLI_ASSOC)){
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                $nombreCategoria = '';
                $arreglo = explode(" ", $row['categoria_id']);
                foreach ($arreglo as $value) {
                    $categoria = new Categoria(new Conexion());
                    $categoria->constructorConId($value);
                    $nombreCategoria .="<a href='../blog/categoria.php?id=$categoria->id'>$categoria->name</a> | ";
                }

                $usuario = new Usuario(new Conexion,$row['usuario_id']);
                $nombre = $usuario->nombre;
                $fecha = Article::fechaEs($row['fecha']);

                $categorias .= "<tr>";
                $categorias .= "<td><a href='../blog/post.php?id=".$row['articulo_id']."'>".$row['titulo']."</a></td>";
                $categorias .= "<td>".$fecha."</td>";
                $categorias .= "<td>".$nombre."</td>";
                $categorias .= "<td>".$nombreCategoria."</td>";
                $categorias .= "</tr> ";
            }
            return $categorias;
        }

        public function articulosATabla(){
            $query = "SELECT * FROM `articulo` ORDER BY fecha DESC";
            $res = $this->con->query($query);
            $categorias = '';
            
            
            while($row = $res->fetch_array(MYSQLI_ASSOC)){
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                $nombreCategoria = '';
                $arreglo = explode(" ", $row['categoria_id']);
                foreach ($arreglo as $value) {
                    $categoria = new Categoria(new Conexion());
                    $categoria->constructorConId($value);
                    $nombreCategoria .="<a href='../blog/categoria.php?id=$categoria->id'>$categoria->name</a> | ";
                }
                
                
        
                $usuario = new Usuario(new Conexion,$row['usuario_id']);
                $nombre = $usuario->nombre;
                $fecha = Article::fechaEs($row['fecha']);

                $categorias .= "<tr>";
                $categorias .= "<td><a href='../blog/post.php?id=".$row['articulo_id']."'>".$row['titulo']."</a></td>";
                $categorias .= "<td>".$nombre."</td>";
                $categorias .= "<td>".$nombreCategoria."</td>";
                $categorias .= "<td>".$fecha."</td>";
                $categorias .= "<td><a href='edit.php?id=".$row['articulo_id']."'>Editar</a></td>";
                $categorias .= "<td><a href='publicar/borrarArticulo.php?id=".$row['articulo_id']."'  Onclick='return confirma();'>Eliminar</a></td>";
                $categorias .= "</tr> ";
            }
            return $categorias;
        }

        public static function fechaEs($fecha){
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            $fecha = new DateTime($fecha);
            $fechaEs = $dias[$fecha->format('w')]." ".$fecha->format('d')." de ".$meses[$fecha->format('n')-1]. " del ".$fecha->format('Y')." a las ".$fecha->format('H:i:s') ;
            return $fechaEs;

        }

        public function ultimas(int $n){
            $query = "SELECT * FROM `articulo` ORDER BY fecha DESC";
            $res = $this->con->query($query);
            $categorias = '';
            $i = 0;
            while(($i < $n)&&$row = $res->fetch_array(MYSQLI_ASSOC)){
                $categorias .= "<a class='lapiz' href='post.php?id=".$row['articulo_id']."'>".$row['titulo']."</a><br>";
                $i++;                       
            }
            return $categorias;
        }


        public function index(){
            $query = "SELECT * FROM `articulo` ORDER BY fecha DESC";
            $res = $this->con->query($query);
            $index = '';
            $i = 0;
            $articulos = array();
            $indice = '';
            while($row = $res->fetch_array(MYSQLI_ASSOC)){
                $index .= "<div class='well'>";
                $categoria = new Categoria(new Conexion());

                $nombreCategoria = '';
                $arreglo = explode(" ", $row['categoria_id']);
                foreach ($arreglo as $value) {
                    $categoria = new Categoria(new Conexion());
                    $categoria->constructorConId($value);
                    $nombreCategoria .= "<a href='categoria.php?id=$categoria->id'>$categoria->name</a> | ";
                }

                $usuario = new Usuario(new Conexion,$row['usuario_id']);
                $nombre = $usuario->nombre;
                $fechaEs = Article::fechaEs($row['fecha']);
                
                $index .=  "<h2 class='tituloPost'><a href='post.php?id=".$row['articulo_id']."'>".$row['titulo']."</a> </h2>";

                $index .=  "<p class='alert-info informacion centrar'><span class='glyphicon glyphicon-time'></span> Publicado por <a href='aboutMe.php'>$nombre</a> el $fechaEs en $nombreCategoria</p>";
                $index .= "<hr><img class='img-responsive portada' src='".$row['img']."' alt=''>";

                $index .= "<p class='blog'>".substr($row['contenido'],0,300)."...</p>";
                $index .= "<a class='btn btn-primary' href='post.php?id=".$row['articulo_id']."'>Leer más<span class='glyphicon glyphicon-chevron-right'></span></a>";
                $index .= "<br></div> ";
                $i++;
               if($i%3==0){
                array_push($articulos, $index);
                $index = ''; 
               }
            }
            if(!($i%3==0))
                array_push($articulos, $index);
            return $articulos;
        }


       

        
    }

    ?>