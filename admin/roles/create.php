<?php

include('../../app/config.php');
include('../../admin/layout/header.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creacion de Roles</h1>
            </div><!-- /.col -->

            <br> <!------------------------------------  TABLA ---------------------->
            <div class="row">
                <!---------------------------- /.WIDGET ------------------------------------------ -->
                <div class="col-md-8">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title">Llenar datos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/roles/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" >Nombre del rol</label>
                                            <input type="text" name="nombre_rol" class="form-control" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                            <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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