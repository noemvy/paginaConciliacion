<!DOCTYPE html>
<html>
<head>
    <title>Conciliación</title>
</head>
<body>
    <h1>Conciliación</h1>
    <form method="post">
        <label for="mes">Seleccione el mes:</label>
        <select id="mes" name="mes">
            <?php
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "conciliacion";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Consultar los meses disponibles
            $sql = "SELECT mes, nombre_mes FROM meses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["mes"] . "'>" . $row["nombre_mes"] . "</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="anio">Seleccione el año:</label>
        <input type="number" id="anio" name="anio" min="2023" value="2023">
        <br>
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mes = $_POST["mes"];
        $anio = $_POST["anio"];

        // Consultar los datos de la conciliación
        $sql = "SELECT * FROM conciliacion WHERE mes = '$mes' AND agno = '$anio'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>Conciliación para el mes " . $mes . " del año " . $anio . "</h2>";
            echo "<p>Saldo anterior: " . $row["saldo_anterior"] . "</p>";
            echo "<p>Más depósitos: " . $row["masdepositos"] . "</p>";
            echo "<p>Más cheques anulados: " . $row["maschequesanulados"] . "</p>";
            echo "<p>Más notas de crédito: " . $row["masnotascredito"] . "</p>";
            echo "<p>Más ajustes de libro: " . $row["masajusteslibro"] . "</p>";
            echo "<p>Subtotal 1: " . $row["subtotal1"] . "</p>";
            echo "<p>Menos cheques girados: " . $row["menoschequesgirados"] . "</p>";
            echo "<p>Menos notas de débito: " . $row["menosnotasdebito"] . "</p>";
            echo "<p>Menos ajustes de libro: " . $row["menosajusteslibro"] . "</p>";
            echo "<p>Subtotal 2: " . $row["saldolibros"] . "</p>";
            echo "<p>Saldo en libros: " . $row["saldolibros"] . "</p>";
            echo "<p>Saldo en banco: " . $row["saldobanco"] . "</p>";
        } else {
            echo "<p>No hay datos de conciliación para el mes " . $mes . " del año " . $anio . "</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>