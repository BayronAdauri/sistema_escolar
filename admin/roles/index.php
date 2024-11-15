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
              <table id="example1" class="table table-dark table-striped table-hover table-sm">
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
                          <a href="show.php?id=<?= $id_rol; ?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                          <a href="edit.php?id=<?= $id_rol; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                          <form action="<?= APP_URL; ?>/app/controllers/roles/delete.php" onclick="preguntar(event)" method="post" id="#miFormulario<?= $id_rol; ?>">
                            <input type="text" name="id_rol" value="<?= $id_rol; ?>" hidden>
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
                                  var form = $('#miFormulario<?= $id_rol; ?>');
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
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
        "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
        "infoFiltered": "(Filtrado de _MAX_ total Roles)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Roles",
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