<?php
session_start();

include "conexion.php";
if(isset($_SESSION['usuario'])){
    
}else{
    
    header("Location: ./index.php");
}


?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administración</title>
    
     <?php include 'views/stylesheet.php';?>

 
  </head>
  <body>

    <header>
     <?php include 'views/cabecera_admin.php';?>
    </header>

    <main role="main">
      
      
    <section id="prove-product-cat-config">
        <div class="container">
            <div class="page-header m-2">
              <h1 class="text-center p-2">Panel de administración</h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-link active"><a href="#Gafas" role="tab" data-toggle="tab">Gafas</a></li>
              <li role="presentation" class="nav-link active"><a href="#Categorias" role="tab" data-toggle="tab">Categorías</a></li>
              <li role="presentation" class="nav-link active"><a href="#Usuarios" role="tab" data-toggle="tab">Usuarios</a></li>
              <li role="presentation" class="nav-link active"><a href="#Pedidos" role="tab" data-toggle="tab">Pedidos</a></li>
            </ul>
            <div class="tab-content">
                <!--=============================Panel Gafas=============================-->
                <div role="tabpanel" class="tab-pane fade in active" id="Gafas">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-product">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar gafa</h2>
                            <form role="form" action="guardar.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Código gafa</label>
                                <input type="text" class="form-control"  placeholder="Código" required maxlength="30" name="codigo-gafa">
                              </div>
                              <div class="form-group">
                                <label>Nombre gafa</label>
                                <input type="text" class="form-control"  placeholder="Nombre de la gafa" required maxlength="45" maxlength="5" name="nombre-gafa">
                              </div>
                             <div class="form-group">
                                <label>Descripción gafas</label>
                                <input type="text" class="form-control"  placeholder="Descripción de las caracteristicas" required minlength="150" name="descrip-gafa">
                              </div>
                              
                            <div class="form-group">
                                <label>Extracto descripción</label>
                                <input type="text" class="form-control"  placeholder="Parte de la descripción" required minlength="150" maxlength="150" name="ext-descrip-gafa">
                              </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" class="form-control"  placeholder="Color de la gafa" required maxlength="100" name="color-gafa">
                              </div>
                              
                              <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control"  placeholder="Precio" required maxlength="20" pattern="[0-9]{1,20}" name="precio-gafa">
                              </div>
                              
                              <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control"  placeholder="Unidades" required maxlength="20" pattern="[0-9]{1,20}" name="stock-gafa">
                              </div>
                              
                             <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="categoria-gafa">
                                   
                                   <?php
                                    $sql = "SELECT * from categoria";
                                    $resultado = $mysqli->query($sql);
                                    while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                    <option value="<?php echo $row['idCategoria']?>"><?php echo $row['nombreCategoria']?></option>
                                    
                                    <?php
                                    }
                                    ?>
                                </select>
                              </div>
 
                              <div class="form-group">
                                <label>Imagen gafa</label>
                                <input type="file" name="img-gafa">
                                <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                              <p class="text-center"><button type="submit" class="btn btn-primary">Guardar</button></p>
                              <div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de producto</h3></div>
                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Código</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Descripción</th>
                                          <th class="text-center">Extracto Descripción</th>
                                          <th class="text-center">Color</th>
                                          <th class="text-center">Precio</th>
                                          <th class="text-center">Stock</th>
                                          <th class="text-center">Imagen</th>
                                          <th class="text-center">Categoria</th>
                                          <th class="text-center">Opciones</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                <?php 
                                      
                                $sql = "SELECT * FROM gafas";
                                $resultado = $mysqli->query($sql);
                                while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $row['idGafas']; ?></td>
                                        <td><?php echo $row['codGafas']; ?></td>
                                        <td><?php echo $row['nombreGafas']; ?></td>
                                        <td><?php echo $row['desCGafas']; ?></td>
                                        <td><?php echo $row['extrDesGafas']; ?></td>
                                        <td><?php echo $row['colorGafas']; ?></td>
                                        <td><?php echo $row['precioGafas']; ?></td>
                                        <td><?php echo $row['stockGafas']; ?></td>
                                        <td><img class="img-fluid" src="data:image/jpg;base64, <?php echo base64_encode($row['imgGafas']);?>"></td>
                                        <td><?php echo $row['Categoria_idCategoria']; ?></td>
                                        <td>Eliminar</td>

                                    </tr>
                                <?php } ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!--==========================Panel Categorias===========================-->
                <div role="tabpanel" class="tab-pane fade" id="Categorias">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-categori">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar categoría</h2>
                                <form action="process/regcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Código</label>
                                        <input class="form-control" type="text" name="categ-code" placeholder="Código de categoria" maxlength="9" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="categ-name" placeholder="Nombre de categoria" maxlength="30" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input class="form-control" type="text" name="categ-descrip" placeholder="Descripcióne de categoria" required="">
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar categoría</button></p>
                                    <br>
                                    <div id="res-form-add-categori" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-categori">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar una categoría</h2>
                                <form action="process/delcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Categorías</label>
                                        <select class="form-control" name="categ-code">
                                            <option value="C1">C1 - Electrodomésticos</option><option value="C2">C2 - Multimedia</option><option value="C3">C3 - Móbiles</option>                                        </select>
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar categoría</button></p>
                                    <br>
                                    <div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar categoría</h3></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Descripción</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                      <div id="update-category">
                                                        <form method="post" action="process/updateCategory.php" id="res-update-category-1">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="hidden" name="categ-code-old" maxlength="9" required="" value="C1">
                                                                <input class="form-control" type="text" name="categ-code" maxlength="9" required="" value="C1">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="categ-name" maxlength="30" required="" value="Electrodomésticos"></td>
                                                              <td><input class="form-control" type="text-area" name="categ-descrip" required="" value="Articulos de primera necesidad para el hogar"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-category-1">Actualizar</button>
                                                                  <div id="res-update-category-1" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      
                                                      <div id="update-category">
                                                        <form method="post" action="process/updateCategory.php" id="res-update-category-2">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="hidden" name="categ-code-old" maxlength="9" required="" value="C2">
                                                                <input class="form-control" type="text" name="categ-code" maxlength="9" required="" value="C2">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="categ-name" maxlength="30" required="" value="Multimedia"></td>
                                                              <td><input class="form-control" type="text-area" name="categ-descrip" required="" value="Articulos de entretenimiento y diversión"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-category-2">Actualizar</button>
                                                                  <div id="res-update-category-2" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      
                                                      <div id="update-category">
                                                        <form method="post" action="process/updateCategory.php" id="res-update-category-3">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" type="hidden" name="categ-code-old" maxlength="9" required="" value="C3">
                                                                <input class="form-control" type="text" name="categ-code" maxlength="9" required="" value="C3">
                                                              </td>
                                                              <td><input class="form-control" type="text" name="categ-name" maxlength="30" required="" value="Móbiles"></td>
                                                              <td><input class="form-control" type="text-area" name="categ-descrip" required="" value="Teléfonos celulares smartphones"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-category-3">Actualizar</button>
                                                                  <div id="res-update-category-3" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                                                              </tbody>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                
                
                
                   <!--==============================Panel Admins===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Usuarios">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-admin">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar administrador</h2>
                                <form action="process/regAdmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="admin-name" placeholder="Nombre" maxlength="9" pattern="[a-zA-Z]{4,9}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" type="password" name="admin-pass" placeholder="Contraseña" required="">
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar administrador</button></p>
                                    <br>
                                    <div id="res-form-add-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-admin">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar administrador</h2>
                                <form action="process/deladmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Administradores</label>
                                        <select class="form-control" name="name-admin">
                                            <option value="admin">admin</option><option value="admin1">admin1</option>                                        </select>
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar administrador</button></p>
                                    <br>
                                    <div id="res-form-del-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12"></div>
                    </div>
                </div>
                <!--==============================Panel pedidos===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Pedidos">
                    <div class="row">
                        <div class="col-xs-12">
                            <br><br>
                            <div id="del-pedido">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar pedido</h2>
                                <form action="process/delPedido.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Pedidos</label>
                                        <select class="form-control" name="num-pedido">
                                            <option value="1">Pedido #1 - Estado(Pendiente) - Fecha(04-11-2017)</option><option value="2">Pedido #2 - Estado(Pendiente) - Fecha(04-11-2017)</option><option value="3">Pedido #3 - Estado(Pendiente) - Fecha(04-11-2017)</option>                                        </select>
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar pedido</button></p>
                                    <br>
                                    <div id="res-form-del-pedido" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                            <br><br>
                             <div class="panel panel-info">
                               <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar estado de pedido</h3></div>
                              <div class="table-responsive">
                                  <table class="table table-bordered">
                                      <thead class="">
                                          <tr>
                                              <th class="text-center">#</th>
                                              <th class="text-center">Fecha</th>
                                              <th class="text-center">Cliente</th>
                                              <th class="text-center">Descuento</th>
                                              <th class="text-center">Total</th>
                                              <th class="text-center">Estado</th>
                                              <th class="text-center">Opciones</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          
                                                    <div id="update-pedido">
                                                      <form method="post" action="process/updatePedido.php" id="res-update-pedido-1">
                                                        <tr>
                                                            <td>1<input type="hidden" name="num-pedido" value="1"></td>
                                                            <td>04-11-2017</td>
                                                            <td>paco</td>
                                                            <td>0%</td>
                                                            <td>100.00</td>
                                                            <td>
                                                                <select class="form-control" name="pedido-status"><option value="Pendiente">Pendiente</option><option value="Entregado">Entregado</option></select>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="submit" class="btn btn-sm btn-primary button-UPPE" value="res-update-pedido-1">Actualizar</button>
                                                                <div id="res-update-pedido-1" style="width: 100%; margin:0px; padding:0px;"></div>
                                                            </td>
                                                        </tr>
                                                      </form>
                                                    </div>
                                                    
                                                    <div id="update-pedido">
                                                      <form method="post" action="process/updatePedido.php" id="res-update-pedido-2">
                                                        <tr>
                                                            <td>2<input type="hidden" name="num-pedido" value="2"></td>
                                                            <td>04-11-2017</td>
                                                            <td>paco</td>
                                                            <td>0%</td>
                                                            <td>100.00</td>
                                                            <td>
                                                                <select class="form-control" name="pedido-status"><option value="Pendiente">Pendiente</option><option value="Entregado">Entregado</option></select>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="submit" class="btn btn-sm btn-primary button-UPPE" value="res-update-pedido-2">Actualizar</button>
                                                                <div id="res-update-pedido-2" style="width: 100%; margin:0px; padding:0px;"></div>
                                                            </td>
                                                        </tr>
                                                      </form>
                                                    </div>
                                                    
                                                    <div id="update-pedido">
                                                      <form method="post" action="process/updatePedido.php" id="res-update-pedido-3">
                                                        <tr>
                                                            <td>3<input type="hidden" name="num-pedido" value="3"></td>
                                                            <td>04-11-2017</td>
                                                            <td>paco</td>
                                                            <td>0%</td>
                                                            <td>100.00</td>
                                                            <td>
                                                                <select class="form-control" name="pedido-status"><option value="Pendiente">Pendiente</option><option value="Entregado">Entregado</option></select>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="submit" class="btn btn-sm btn-primary button-UPPE" value="res-update-pedido-3">Actualizar</button>
                                                                <div id="res-update-pedido-3" style="width: 100%; margin:0px; padding:0px;"></div>
                                                            </td>
                                                        </tr>
                                                      </form>
                                                    </div>
                                                                                          </tbody>
                                  </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>
    </section>

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>