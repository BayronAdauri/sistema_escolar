<?php

$id_rol = $_GET['id'];


include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/roles/datos_del_rol.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Rol: <?=$nombre_rol;?></h1>
            </div><!-- /.col -->

            <br> <!------------------------------------  TABLA ---------------------->
            <div class="row">
                <!---------------------------- /.WIDGET ------------------------------------------ -->
                <div class="col-md-8">
                    <div class="card card-outline card-info bg-light">
                        <div class="card-header">
                            <h3 class="card-title">Datos Registrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" >Nombre del rol</label>
                                            <p><?=$nombre_rol;?></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>
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