<?php

include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/roles/listado_de_roles.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Listado de Roles</h1>
      </div><!-- /.col -->

      <br> <!------------------------------------  TABLA ---------------------->
      <div class="row">
        <!---------------------------- /.WIDGET ------------------------------------------ -->
        <div class="col-md-8">
          <div class="card bg-light">
            <div class="card-header">
              <h3 class="card-title">Roles registrados</h3>

              <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm">Crear nuevo</a>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-dark table-striped table-hover table-sm">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nombre del rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador_rol = 0;
                  foreach ($roles as $rol) {
                    $id_rol = $rol['idRol'];
                    $contador_rol = $contador_rol + 1;
                  ?>
                    <tr>
                      <td style="text-align: center;"><?= $contador_rol; ?></td>
                      <td><?= $rol['nombre_rol']; ?></td>
                      <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                          <button type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></button>
                          <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div> <!-- content wrapper -->
</div>


<?php

include('../../admin/layout/footer.php');
include('../../layout/mensajes.php');

?>