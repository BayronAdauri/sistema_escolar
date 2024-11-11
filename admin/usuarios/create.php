<?php

include('../../app/config.php');
include('../../admin/layout/header.php');

include('../../app/controllers/roles/listado_de_roles.php')

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Creacion de Usuarios</h1>
            </div><!-- /.col -->

            <br> <!------------------------------------  TABLA ---------------------->
            <div class="row">
                <!---------------------------- /.WIDGET ------------------------------------------ -->
                <div class="col-md-12">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3 class="card-title">Llenar datos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controllers/usuarios/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Rol del usuario</label>
                                            <div class="form-inline">
                                                <select name="id_rol" id="" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['idRol']; ?>"><?= $role['nombre_rol']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary"><i class="bi bi-file-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del usuario</label>
                                            <input type="text" name="nombre" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo Electronico</label>
                                            <input type="email" name="email" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="password" name="password" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Confirmar contraseña</label>
                                            <input type="password" name="password2" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                            <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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