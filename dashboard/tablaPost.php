<?php
require "header.php";            
$message = isset($_GET['message']) && isset($_GET['type']) ? 
MessageFactory::createMessage($_GET['type']) :false;


$message_out = $message ? $message->getMessage($_GET['message']) : '';
?>
<script>
function confirma()
{
   var x = confirm("¿De verdad quieres este post?");
      if (x){
         var y = confirm("¿estas seguro?");
      if (y)
          return true;
      else
        return false;
      }else
        return false;
}    
</script>

                
                <!-- /.row -->

                    <?php
                    echo $message_out;?>
                    <div class="">
                        <h2>Articulos publicados</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-responsive">
                                <thead>
                                    <tr> 
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Categoria</th>                                    
                                        <th>Fecha</th>
                                        <th>Editar</th>
                                        <th>Autor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   $articulo = new Article(new Conexion());
                                   echo $articulo->articulosATabla();
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
               

             
                    


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
