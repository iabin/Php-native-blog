<?php 
require 'header.php';
$categoria =  new Categoria(new Conexion());


?>
                    <div class="container">
                      <br><br>
                      <h1>CATEGORIAS</h1>
                      <p>La lista completa de todas las categorias</p>            
                      <div class="list-group">
                        <?Php echo $categoria->categoriaAtabla()?>
                        </div>
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
