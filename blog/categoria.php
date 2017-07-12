<?php
require "header.php";


$id = isset($_GET['id']) ? 
$_GET['id'] :false;

$categoria = new Categoria(new Conexion());
if($id){
    $categoria->constructorConId($id);
}else {
    echo "<br><br><h1>Error al acceder a la id</h1>";
    exit();
}




?>
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header " style="background-image: url('https://thumbs.dreamstime.com/b/computadora-port%C3%A1til-lupa-10910874.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading ">
                        <h1 class="cabeza"><?php echo $categoria->name; ?></h1>                      
                    </div>                                                                                          
                </div>               
            </div>       
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-12  col-md-12 ">                                                                               
                     <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr> 
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Categoria</th>                                    
                                        <th>Fecha</th>
                      
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   
                                   echo $categoria->articulosCategoria();
                                   ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </article>

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
