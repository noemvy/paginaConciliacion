
<?php
include '../conexion/conciliacion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaccion = $_POST['transaccion'];
    $fecha = $_POST['fecha'];
    $monto = (float) $_POST['monto']; // Convertir monto a float

    // Verificar si ya existe una fila con los mismos valores
    $sql = "SELECT * FROM otros WHERE transaccion = ? AND fecha = ? AND monto = ?";
    $stmt = $conect->prepare($sql);
    $stmt->bind_param("ssd", $transaccion, $fecha, $monto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Ya existe una transacción con los mismos valores.";
    } else {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO otros (transaccion, fecha, monto) VALUES (?, ?, ?)";
        $stmt = $conect->prepare($sql);

        // Vincular los parámetros con los valores recibidos
        $stmt->bind_param("ssd", $transaccion, $fecha, $monto);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Transacción guardada correctamente.";
        } else {
            echo "Error al guardar la transacción.";
        }

        // Cerrar la declaración preparada
        $stmt->close();
    }

    $conect->close();
}
?>