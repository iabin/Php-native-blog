<?php 
require 'header.php';
$articulo =  new Article(new Conexion());


?>
                    <div class="container">
                      <br><br>
                      <h2>TODOS LOS ARTÍCULOS</h2>
                      <p>Del mas viejo al mas nuevo</p>            
                      <table class="table table-bordered table-striped table-hover tabla">
                        <thead>
                          <tr>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Autor</th>
                            <th>Categorias</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php echo $articulo->articulosIndex()?>
                        </tbody>
                      </table>
                    </div>
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
