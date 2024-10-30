<?php
// ----------------------------Mensajes a mostrar al ingreso dele sistema------------------------------

if ( (isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])) ){
    $mensaje =$_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
?>
<script>
    Swal.fire({
        position: "center",
        icon: "<?=$icono;?>",
        title: "<?=$mensaje;?>",
        showConfirmButton: false,
        timer: 3000
    });
</script>

<?php
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);

}
?>