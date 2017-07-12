<?php require "header.php";

$articulo = new Article(new Conexion());

 ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('http://fondopantalla.com.es/file/7/2560x1440/crop/fondo-de-pantalla-plano-de-color-arena.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <img class="portada img-responsive"src="../images/portada.png" alt="">
                        <hr class="small">
                        <span class="subheading">Bienvenido</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

        <div class="busqueda well  col-md-8 col-md-offset-2 ">
                    
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                      </div>
        </div>
                    <!-- /.input-group -->
   
    <!-- Main Content -->
    <div class="container">
     <!-- Page Content -->

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 margenes">
            <div class="blog" id="write">
                
                <?php 
                    $arreglo = $articulo->index();
                ?>
                
                    <script type="text/javascript">
                        // obtenemos el array de valores mediante la conversion a json del
                        // array de php
                        var arrayJS=<?php echo json_encode($arreglo);?>;
                        var i = 0;
                        var nodo = document.getElementById("write");
                            nodo.innerHTML = (arrayJS[i]);
                        // Mostramos los valores del array
                        function cargarMas()
                        {
                            i = i+1;
                            if(i>=arrayJS.length){
                                alert("Ya no hay más posts")
                                return;
                            }    
                            var node = document.getElementById("write");
                            node.innerHTML += (arrayJS[i]);
                           
                        }
                       
                    </script>
            
                    </div>
              
                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <button type="button" class="btn btn-success" Onclick="return cargarMas();">&larr; Cagar más;</button>
                    </li>
                </ul>
                <br><br>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 ">

                <div class="well">
                 <div class="col-xs-5">     
                        <?php $usuario = new Usuario(new Conexion ,1); $nomUs = $usuario->nombre;?>                       
                        <img class="aboutMe2 img-responsive" src="https://cdn0.iconfinder.com/data/icons/octicons/1024/mark-github-256.png" alt="">
                        </div> 
                         <div class="col-xs-7">
                             <h4 class="aboutMe2">¿Te gustaría usar el código de este blog? </h4>
                         </div>
                        
                         
                             <p class="aboutMe2">En ese caso, entra a la siguente liga, te llevará al proyecto en github de este blog</p>
                             <a class="btn-success" href="https://github.com/iabin/otroblogpendejo">Ir a github</a>
                </div>


                <!-- Blog Categories Well -->
                <div class="well centrar">
                    <h4 class="lista-index">Blog Categories</h4>
                    <div class="row lista-index">
                        <div class="col-lg-6">
                            <ul class="list-unstyled centrar">
                                <?php 
                                $categoria = new Categoria(new Conexion());
                                echo $categoria->listarCategorias();
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <div class="lista">

                    <h4 >Checa las últimas publicaciones </h4>
                    <h5>Ultimas publicaciones</h5>
                    <?php $articulo = new Article(new Conexion());
                          echo $articulo->ultimas(20)?>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
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
