<?php encabezado() ?>
<!-- Asegúrate de que la función 'encabezado' esté definida y añada correctamente la cabecera de tu página. -->

<div id="layoutSidenav_content">
    <main>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Alertas de Caducidad</h2>
                    <table class="table table-striped mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Referencia</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Existencias</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $alerta): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($alerta['id']); ?></td>
                                    <td><?php echo htmlspecialchars($alerta['Referencia']); ?></td> <!-- Nota el cambio aquí -->
                                    <td><?php echo htmlspecialchars($alerta['descripcion']); ?></td>
                                    <td><?php echo htmlspecialchars($alerta['fecha']); ?></td>
                                    <td><?php echo htmlspecialchars($alerta['fechaVencimiento']); ?></td>
                                    <td><?php echo htmlspecialchars($alerta['existencias']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . "alertasdeCaducidad/eliminar/" . $alerta['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta alerta?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php pie() ?>
<!-- Asegúrate de que la función 'pie' esté definida y añada correctamente el pie de página de tu sitio. -->
