<?php encabezado() ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="text-center">Tarjetas de Almacenaje</h5>
            <div class="row">
                <div class="col-lg-12">
                    <!-- El botón para agregar nueva tarjeta  -->
                    <button class="btn btn-primary mb-2" type="button" data-toggle="modal" data-target="#nuevaTarjeta"><i class="fas fa-plus"></i></button>
                            <!-- Modal para Nueva Tarjeta de Almacenaje -->
                            
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th>idUsuario</th>
                                    <th>Nombre del Producto</th>
                                    <th>idProveedor</th>
                                    <th>Fecha</th>
                                    <th>Fecha de Vencimiento</th>
                                    <th>Referencia</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Existencia</th>
                                    <th>Costo Unitario</th>
                                    <th>Costo Promedio</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                    <th>Saldo</th>
                                    <!-- <th>Acción</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $tarjetaalmacenaje) { ?>
                                    <tr>
                                        <td><?php echo $_SESSION['id']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['nombreProducto']; ?></td>
                                        <td> 100230 </td>
                                        <td><?php echo $tarjetaalmacenaje['fecha']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['fechaVencimiento']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['Referencia']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['Entrada']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['Salida']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['existencias']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['costoUnitario']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['costoPromedio']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['debe']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['haber']; ?></td>
                                        <td><?php echo $tarjetaalmacenaje['saldo']; ?></td>
                                        <td>
                                            <!-- Botones de acción (editar, eliminar, etc.) -->
                                            <a class="btn btn-primary" href="<?php echo base_url() ?>tarjetaalmacenaje/editar?id=<?php echo $tarjetaalmacenaje['id'] ?>"><i class="fas fa-edit"></i></a>
                                            <form method="post" action="<?php echo base_url() ?>tarjetaalmacenaje/eliminar" class="d-inline eliminar">
                                                <input type="hidden" name="id" value="<?php echo $tarjetaalmacenaje['id']; ?>">
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="nuevaTarjeta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalNuevaTarjetaTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevaTarjetaTitle">Nueva Tarjeta de Almacenaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>tarjetaalmacenaje/registrar" method="post" autocomplete="off">
                    
                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['id']; ?>">

                    <div class="form-group">
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input id="nombreProducto" class="form-control" type="text" name="nombreProducto" required>
                    </div>
                    <div class="form-group">
                        <label for="idProveedor">Proveedor</label>
                        <select id="idProveedor" class="form-control" name="idProveedor" required>
                        <option value="">Seleccione un proveedor</option>
                        <?php foreach($data as $prov): ?>
                        <option value="<?php echo $prov['id']; ?>"><?php echo $prov['nombre']; ?></option>
                        <?php endforeach; ?>
    </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" class="form-control" type="date" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaVencimiento">Fecha de Vencimiento</label>
                        <input id="fechaVencimiento" class="form-control" type="date" name="fechaVencimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="Referencia">Referencia</label>
                        <input id="Referencia" class="form-control" type="text" name="Referencia">
                    </div>
                    <div class="form-group">
                        <label for="Entrada">Entrada</label>
                        <input id="Entrada" class="form-control" type="number" name="Entrada">
                    </div>
                    <div class="form-group">
                        <label for="Salida">Salida</label>
                        <input id="Salida" class="form-control" type="number" name="Salida">
                    </div>
                    <!-- Omito el campo 'estado' porque normalmente ese campo se maneja internamente en la aplicación -->
                    <div class="form-group">
                        <label for="existencias">Existencias</label>
                        <input id="existencias" class="form-control" type="number" name="existencias" required>
                    </div>
                    <div class="form-group">
                        <label for="costoUnitario">Costo Unitario</label>
                        <input id="costoUnitario" class="form-control" type="number" step="0.01" name="costoUnitario" required>
                    </div>
                    <div class="form-group">
                        <label for="costoPromedio">Costo Promedio</label>
                        <input id="costoPromedio" class="form-control" type="number" step="0.01" name="costoPromedio" required>
                    </div>
                    <div class="form-group">
                        <label for="debe">Debe</label>
                        <input id="debe" class="form-control" type="number" step="0.01" name="debe">
                    </div>
                    <div class="form-group">
                        <label for="haber">Haber</label>
                        <input id="haber" class="form-control" type="number" step="0.01" name="haber">
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo</label>
                        <input id="saldo" class="form-control" type="number" step="0.01" name="saldo" required>
                    </div>
                    <!-- Supongo que el 'idUsuario' y 'idOrden' se manejan internamente o a través de otra lógica de selección -->
                    <!-- <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" class="form-control" name="descripcion" required></textarea>
                    </div> -->
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php pie() ?>



    
