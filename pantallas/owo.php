<?php include "../consultas/guardarTransaccion.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main id="mainTransacciones" onsubmit="validarCamposOtrasTransacciones(event);">
        <form action="" method="post">
            <h1>Otras Transacciones - Depósitos,Ajustes y Notas(DB/CR)</h1>
            <div class="transaccion-div">
            <label id="transacciones" for="transacciones">Transacción</label>
            <select name="transaccion" id="transaccion">
                <option value="">Seleccione una opción</option>
                <?php include '../consultas/transaccionesConsulta.php'; obtenerOpcionesTransacciones($conect); ?>
            </select>
            <br>
                <label for="fecha">Fecha</label>
                <input id="fecha" name='fecha' class="fecha"  type="date">
                <label for="monto">Monto</label>
                <input id="monto" name='monto' type="text" ><br>
                <button class="botones-transaccion"  type='submit' >Grabar</button>
                <button class="botones-transaccion" type = 'reset'>Nuevo</button>
                </div>
        </form>
    </main>
</body>
</html>