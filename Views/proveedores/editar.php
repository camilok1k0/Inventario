<?php encabezado() ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row p-5">
                <form action="<?php echo base_url() ?>Proveedores/Modificar" method="post" id="frmProveedores" class="row" autocomplete="off">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="apellidos" class="form-control" type="text" name="apellidos" value="<?php echo $data['apellidos']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechainicio">Fecha Inicio</label>
                            <input id="fechainicio" class="form-control" type="date" name="fechainicio" value="<?php echo $data['fechainicio']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cantpedidos">Cantidad de Pedidos</label>
                            <input id="cantpedidos" class="form-control" type="number" name="cantpedidos" value="<?php echo $data['cantpedidos']; ?>" required>
                        </div>
                    </div>
                    <div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Modificar</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>proveedores/listar">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php pie() ?>
