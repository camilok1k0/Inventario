<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4">Editar Tarjeta de Almacenaje</h4>
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <form action="<?php echo base_url(); ?>tarjetaalmacenaje/editar" method="post" autocomplete="off">
                        <div class="card">
                            <div class="card-header">
                                Actualizar Datos
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombreProducto">Nombre del Producto</label>
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <input id="nombreProducto" class="form-control" type="text" name="nombreProducto" value="<?php echo $data['nombreProducto']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input id="fecha" class="form-control" type="date" name="fecha" value="<?php echo $data['fecha']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="fechaVencimiento">Fecha de Vencimiento</label>
                                    <input id="fechaVencimiento" class="form-control" type="date" name="fechaVencimiento" value="<?php echo $data['fechaVencimiento']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Referencia">Referencia</label>
                                    <input id="Referencia" class="form-control" type="number" name="Referencia" value="<?php echo $data['Referencia']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Entrada">Entrada</label>
                                    <input id="Entrada" class="form-control" type="number" name="Entrada" value="<?php echo $data['Entrada']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Salida">Salida</label>
                                    <input id="Salida" class="form-control" type="number" name="Salida" value="<?php echo $data['Salida']; ?>" required>
                                </div>
                                <!-- Puedes agregar campos adicionales aquí según necesites -->
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Modificar</button>
                                <a href="<?php echo base_url(); ?>TarjetaAlmacenaje" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php pie() ?>
