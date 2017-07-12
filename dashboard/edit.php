<?php
require "header.php"; 
    
$message = isset($_GET['message']) && isset($_GET['type']) ? 
MessageFactory::createMessage($_GET['type']) :false;


$message_out = $message ? $message->getMessage($_GET['message']) : '';

$id = isset($_GET['id']) ? 
$_GET['id'] :false;

$articulo = new Article(new Conexion());
if($id){
    $articulo->constructorConId($id);
}else {
    echo "<h1>Error al acceder a la id</h1>";
    exit();
}
?>
<script>
function confirma()
{
   var x = confirm("¿De verdad quieres crear una nueva categoría?");
      if (x)
          return true;
      else
        return false;
}    
</script>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Editando: </small><?php echo $articulo->titulo?> 
                        </h1>
                        
                    </div>
                </div>


                   <div class="col_xs-8">
                    <?php echo $message_out;?>
               </div>
              
               <div class="centering col-md-offset-2 col-md-8">         
                <table class="table centering"><h4 class="centering">TABLA DE APOYO HTML</h4>
                    <thead>
                      <tr>
                        <th>Acción</th>
                        <th>comando</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Subtítulo</td>
                        <td>
                        &lt;h2 class="subheading center-block"&gt;&lt;/h2&gt;</td>  
                      </tr>
                      <tr>
                        <td>Imagen y pie de pagina</td>
                        <td>
                       <?php $cadena = "<img class='img-responsive imagenes' src='imagen' alt='><br>
                                        <span class='caption text-muted'>tu texto</span>";
                            echo $cadena = htmlspecialchars($cadena); ?> </td>               
                      </tr>
                      <tr>
                        <td>cabeza de sección</td>
                        <td>&lt;h2 class="section-heading"&gt;The Final Frontier&lt;/h2&gt;</td>
                      </tr>
                    </tbody>
                </table>
                </div>
                
                <!-- /.row -->
            
                <div class="col-xs-12 col-sm-4 col-sm-push-8"  >
                    <form  method="post" action="publicar/nuevaCategoria.php">               
                        <label for="newC">Crear una categoría</label>
                        <input type="text" id="newC" name="nuevaCategoria" class="form-control"  placeholder="Título">
                        <button  Onclick="return confirma();" name="submit" type="submit" class="btn btn-default" >Enviar</button>
                    </form>
                </div>   



                  <form  method="post" action="publicar/editarArticulo.php?id=<?php echo $articulo->id ?>">
                     <div class="form-group col-xs-12 col-sm-8 col-sm-pull-4">
                        <label for="categoria">Seleccione una categoría ó cree una nueva</label>
                        <select class="form-control selectpicker" id="categoria" required name="categoria[]" multiple>
                            <option value="<?php echo  $articulo->categoria;?>">
                            <?php $cates = '';
                                  $arreglo = explode(" ", $articulo->categoria);
                                   foreach ($arreglo as $value) {
                                       if(empty($value))
                                        continue;
                                        $categoria = new Categoria(new Conexion());
                                        $categoria->constructorConId($value);
                                        $cates .="$categoria->name, ";
                                 }
                              echo $cates;   ?></option>
                          <?php
                            $categoria = new Categoria(new Conexion());
                            echo $categoria->verCategorias();
                            ?>
                        </select>
                        </div>

                      <div class="form-group col-xs-12">
                        <label for="tittle">Título</label>
                        <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Título" value="<?php echo $articulo->titulo;?>">
                      </div>
                    
                    
                      <div class="form-group col-xs-12">
                        <label for="textArea">Contenido</label>
                        <textarea class="form-control" id="textArea" rows="25"name="contenido"><?php echo $articulo->contenido;?></textarea>
                     </div>
                    
                    <div class="form-group col-xs-12">
                        <label for="img">Url de la imagen de portada</label>
                        <input type="text" name="image" class="form-control" id="img" placeholder="URL" value="<?php echo $articulo->imagen;?>">
                    </div>  


                      <div class="form-group col-xs-12">
                          <button type="submit" name="enviar" class="btn btn-default">Submit</button>
                      </div>

                    </form>  

                <!-- /.row -->








                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                     

                <!-- /.row -->

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
