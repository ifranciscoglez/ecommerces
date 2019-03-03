<?php
session_start();

include "../conexion.php";
$update = true;
if(isset($_SESSION['usuario'])){
    

}else{
    
    header("Location: ../index.php");
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
    
     <link href="../css/bootstrap.min.css" rel="stylesheet">
         <!-- SCRIPTS JS-->
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="peticion_camara.js"></script>
		
  </head>
  <body>

    <header>
     <?php include '../views/cabecera_admin.php';?>
    </header>

    <main role="main">
      
    <section id="bd-example bd-example-tabs">
        <div class="container">
            <div class="page-header m-2">
              <h1 class="text-center p-2">Panel de administración</h1>
            </div>
            <!-- Nav tabs -->
            <nav class="nav nav-tabs" role="tablist">
              <a class="nav-item nav-link active" id="agregar-tab" href="#agregar" role="tab" data-toggle="tab" role="tab" aria-controls="nav-agregar" aria-selected="true">Agregar</a>
              <a class="nav-item nav-link" id="modificar-tab" href="#modificar" role="tab" data-toggle="tab" role="tab" aria-controls="nav-" aria-selected="false">Acciones</a>         
            </nav>
               
                <div class="tab-content" id="nav-tabContent">
                <!--=============================Panel Gafas=============================-->
                <div role="tabpanel" class="tab-pane fade show active" id="agregar" aria-labelledby="agregar-tab">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="agregar">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar nuevas camara</h2>
                            <form role="form" action="guardar_producto.php" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Código Camara</label>
                                <input type="text" class="form-control"  placeholder="Código" required maxlength="30" name="codigo-camaras">
                              </div>
                              <div class="form-group">
                                <label>Modelo Camara</label>
                                <input type="text" class="form-control"  placeholder="Nombre de la gafa" required maxlength="45" minlength="5" name="modelo-camaras">
                              </div>
                             <div class="form-group">
                                <label>Descripción Camara</label>
                                <input type="text" class="form-control"  placeholder="Descripción de las caracteristicas" required minlength="100" name="descrip-camara">
                              </div>
                              
                            <div class="form-group">
                                <label>Extracto descripción</label>
                                <input type="text" class="form-control"  placeholder="Parte de la descripción" required minlength="20" maxlength="150" name="ext-descrip-camara">
                              </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" class="form-control"  placeholder="Color de la gafa" maxlength="100" name="color-camara">
                              </div>
                              
                              <div class="form-group">
                                <label>Precio</label>
                                <input type="text" class="form-control"  placeholder="Precio" required maxlength="20" pattern="[0-9]{1,20}" name="precio-camara">
                              </div>
                              
                              <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control"  placeholder="Unidades" required maxlength="20" pattern="[0-9]{1,20}" name="stock-camara">
                              </div>
 
                              <div class="form-group">
                                <label>Imagen producto</label>
                                <input type="file" name="img-camara">
                                <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                              <p class="text-center"><button type="submit" class="btn btn-primary">Guardar</button></p>
                              <div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!--=============================Panel Modificar=============================-->
                <div role="tabpanel" class="tab-pane fade" id="modificar" aria-labelledby="modificar-tab"  >
                <div class="row">
                 <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="modifcar">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Camaras</h2>
                          <section>
                                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar camara..">
                          </section>
                        </div>
                    </div>
                   <div class="col-xs-12 col-sm-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Modificar datos de producto</h3></div>
                          <div class="table-responsive">
                          <form role="form" action="editar_producto.php" method="POST">

                                 <section id="tabla_resultado">
		                        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
                                 </section>
                                 
                                 
                   
                          </form>
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
    <?php include '../views/footer.php';?>
    </main>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="js/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/holder.min.js"></script>  </body>
</html>

