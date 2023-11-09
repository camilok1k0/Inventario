<?php encabezado() ?>
<!-- Contenido Principal -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Proveedores</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Gestión de Proveedores</li>
            </ol>
            <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nuevoProveedor">Nuevo</button>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha Inicio</th>
                                    <th>Cantidad Pedidos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí se llenará la tabla con los datos de los proveedores -->
                                <?php 
                                foreach ($data as $prov) { ?>
                                <tr>
                                    <td><?php echo $prov['id']; ?></td>
                                    <td><?php echo $prov['nombre']; ?></td>
                                    <td><?php echo $prov['apellidos']; ?></td>
                                    <td><?php echo $prov['fechainicio']; ?></td>
                                    <td><?php echo $prov['cantpedidos']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>Proveedores/editar?id=<?php echo $prov['id']; ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form  action="<?php echo base_url(); ?>Proveedores/listar" method="post" class="d-inline eliminar">
                                            <input type="hidden" name="id" value="<?php echo $proveedor['id']; ?>">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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
    <!-- Modal para nuevo proveedor -->
    <div class="modal fade" id="nuevoProveedor" tabindex="-1" role="dialog" aria-labelledby="modalLabelNuevoProveedor" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelNuevoProveedor">Agregar Nuevo Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>proveedores/insertar" autocomplete="off" method="post">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="fechainicio">Fecha Inicio</label>
                            <input type="date" class="form-control" id="fechainicio" name="fechainicio" required>
                        </div>
                        <div class="form-group">
                            <label for="cantpedidos">Cantidad de Pedidos</label>
                            <input type="number" class="form-control" id="cantpedidos" name="cantpedidos" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal para nuevo proveedor -->
    <!-- Modal para editar proveedor -->
    <!-- Modal para editar proveedor -->
<div class="modal fade" id="editarProveedorModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelEditarProveedor" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelEditarProveedor">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>Proveedores/actualizar" method="post" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editar_id">
                    <div class="form-group">
                        <label for="editar_nombre">Nombre</label>
                        <input type="text" class="form-control" id="editar_nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="editar_apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="editar_apellidos" name="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="editar_fechainicio">Fecha Inicio</label>
                        <input type="date" class="form-control" id="editar_fechainicio" name="fechainicio" required>
                    </div>
                    <div class="form-group">
                        <label for="editar_cantpedidos">Cantidad de Pedidos</label>
                        <input type="number" class="form-control" id="editar_cantpedidos" name="cantpedidos" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php pie() ?>


