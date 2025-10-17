<?php
    include('../bd.config/bd.php');

    $sql = "SELECT id_bairro_rota, nome_bairro FROM Bairro";
    $resultado = $conn->query($sql);

    $bairros = [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $bairros[] = $row;
        }
    }

    echo json_encode($bairros);
    $conn->close();
?>
