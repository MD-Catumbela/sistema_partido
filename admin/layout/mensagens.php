<?php
if ((isset($_SESSION['mensagem'])) && (isset($_SESSION['icone']))) {
    $resposta = $_SESSION['mensagem'];
    $icone = $_SESSION['icone']; ?>
    <script>
        Swal.fire({
            position: "top-center",
            icon: "<?= $icone; ?>",
            title: "<?= $resposta; ?>",
            showConfirmButton: false,
            timer: 4500
        });
    </script>
<?php
    unset($_SESSION['mensagem']);
    unset($_SESSION['icone']);
}
