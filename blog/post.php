<?php
require "header.php";


$id = isset($_GET['id']) ? 
$_GET['id'] :false;

$articulo = new Article(new Conexion());
if($id){
    $articulo->constructorConId($id);
     $nombreCategoria = '';
    $arreglo = explode(" ", $articulo->categoria);
          foreach ($arreglo as $value) {
                $categoria = new Categoria(new Conexion());
                $categoria->constructorConId($value);
                $nombreCategoria .= "<a href='../blog/categoria.php?id=$categoria->id'>$categoria->name</a> | ";
            }
}else {
    echo "<br><br><h1>Error al acceder a la id</h1>";
    exit();
}
?>

 
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo $articulo->imagen; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading ">
                        <h1 class="cabeza"><?php echo $articulo->titulo; ?></h1>                      
                    </div>                                                                                          
                </div>               
            </div>       
        </div>
    </header>

    <!-- Post Content -->
   
        <div class="container  col-lg-10 col-lg-push-1">
            <div class="row ">
                <div class="well col-xs-12 col-md-9 col-lg-8 col-lg-offset-2  col-md-offset-1">                                                                               
                    <p class="alert-info informacion posteado"><span class="glyphicon glyphicon-time"></span>Publicado por  <a href="aboutMe.php"><?php $usuario = new Usuario(new Conexion(),$articulo->usuario);
                                                                        $nomUs = $usuario->nombre;
                                                                        echo $nomUs;?></a> el <?php echo Article::fechaEs($articulo->fecha); ?> en <?php echo $nombreCategoria; ?></p>
                              
                    <p class="blog"><?php echo $articulo->contenido;?></p>
                </div>
                         <div class= " bg-success  col-xs-12 col-md-9 col-lg-8 col-md-offset-1 col-lg-offset-2 ">
                        <div class="col-xs-5">                            
                        <img class="aboutMe img-responsive" src="../images/perfil.png" alt="">
                        </div> 
                         <div class="col-xs-7">
                             <h4 class="aboutMe">¿Quien es <?php echo $nomUs; ?>? </h4>
                         </div>
                        
                         
                             <p class="aboutMe"><?php echo $usuario->descripcion;?></p>
                         
                         </div>
                       
                             
                       
                    
            </div><br>
        </div>

             

                <div class="well col-xs-8 col-xs-offset-2 col-lg-offset-0 col-lg-2 col-lg-pull-10">
                    <div class="lista">

                    <h4 >¿Te gustó el post?,comenta y revisa los demás :) </h4>
                    <h5>Ultimas publicaciones</h5>
                    <?php $articulo = new Article(new Conexion());
                          echo $articulo->ultimas(5)?>
                    </div>
                </div>

            <div class="well col-xs-8 col-xs-offset-2 col-lg-offset-0 col-lg-2 col-lg-pull-10 ">
                    <div class=" centrar">
                    <h4 class="lista">Categorías que podrían interesarte</h4>
                    <div class="row lista">
                        <div class="col-lg-12 ">
                            <ul class="list-unstyled">
                                <?php 
                                $categoria = new Categoria(new Conexion());
                                echo $categoria->listaPlana(10);
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                    </div>
                </div>
  
  
    <hr>
    

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
