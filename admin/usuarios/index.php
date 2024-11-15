<?php

include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/usuarios/listado_de_usuarios.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content">
    <div class="container">
      <div class="row">
        <h1>Listado de Usuarios</h1>
      </div><!-- /.col -->

      <br> <!------------------------------------  TABLA ---------------------->
      <div class="row">
        <!---------------------------- /.WIDGET ------------------------------------------ -->
        <div class="col-md-12">
          <div class="card bg-light">
            <div class="card-header">
              <h3 class="card-title">Usuarios registrados</h3>

              <div class="card-tools">
                <a href="create.php" class="btn btn-primary btn-sm">Crear nuevo</a>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-dark table-striped table-hover table-sm">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nombre de usuario</th>
                    <th>Rol de usuario</th>
                    <th>Correo</th>
                    <th>Fecha de Creacion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador_usuarios = 0;
                  foreach ($usuarios as $usuario) {
                    $id_usuario = $usuario['id_usuario'];
                    $contador_usuarios = $contador_usuarios + 1;
                  ?>
                    <tr>
                      <td style="text-align: center;"><?= $contador_usuarios; ?></td>
                      <td><?= $usuario['nombre']; ?></td>
                      <td><?= $usuario['nombre_rol']; ?></td>
                      <td><?= $usuario['email']; ?></td>
                      <td><?= $usuario['fyhCreacion']; ?></td>
                      <td><?= $usuario['estado']; ?></td>
                      <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="show.php?id=<?= $id_usuario; ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                          <a href="edit.php?id=<?= $id_usuario; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                          <form action="<?= APP_URL; ?>/app/controllers/roles/delete.php" onclick="preguntar(event)" method="post" id="#miFormulario<?= $id_usuario; ?>">
                            <input type="text" name="id_rol" value="<?= $id_usuario; ?>" hidden>
                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                          </form>
                          <script>
                            function preguntar(event) {
                              event.preventDefault();
                              Swal.fire({
                                title: 'Eliminar',
                                text: '¿Desea eliminar este registro?',
                                icon: 'question',
                                showDenyButton: true,
                                confirmButtonText: 'Eliminar',
                                confirmButtonColor: '#a5161d',
                                denyButtonText: 'Cancelar',
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  var form = $('#miFormulario<?= $id_usuario; ?>');
                                  form.submit();
                                }
                              });
                            }
                          </script>
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

<!-- SCRIPT QUE PERMITE CAMBIAR EL IDIOMA Y AGREGA MAS FUNCIONES A LA TABLA-->
<script>
  $(function() {
    $("#example1").DataTable({
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay informacion",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
        "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Usuarios",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      buttons: [{
          extend: 'collection',
          text: 'Reportes',
          orientation: 'landscape',
          buttons: [{
            text: 'Copiar',
            extend: 'copy',
          }, {
            extend: 'pdf'
          }, {
            extend: 'csv'
          }, {
            extend: 'excel'
          }, {
            text: 'Imprimir',
            extend: 'print'
          }]
        },
        {
          extend: 'colvis',
          text: 'Visor de columnas',
          collectionLayout: 'fixed three-column'
        }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>