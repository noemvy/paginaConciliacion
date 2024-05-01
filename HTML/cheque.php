<?php include "../consultas/chequeConsultas.php" ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cheque.css">
    <script src="../funciones/chequeFunciones.js"></script>
    <title>Cheque</title>
   
</head>
<body onload="pasarMonto()">
    <main id="contenido">
        <div class="elemento1">
            <h3 class="tituloCreacion">Creación</h3>
            <div class="titulos1">
                <h3 class="tituloCheques">cheques</h3>
                <h3 class="tituloObjetosDeGastos">Objetos de Gastos</h3>
            </div>
            <div class="titulos2">
                <label class="subTitulo1">N°. de Cheque</label>
                <span id="mensajeCheque"></span><br>
                <label class="subTitulo2">Fecha</label>
                <label class="subTitulo3">Objeto</label>
                <label class="subTitulo4">Monto</label>
            </div>
            <form method="post" id="chequeForm">
                <div class="inputs">
                    <input class="inputs1" type="text" name="numCheque" id="numCheque" required onblur="verificarCheque(this.value)" value="<?php echo $numCheque ?>"> 
                    <input class="inputs2" type="date" name="fecha" id="fecha" required>
                    <select name="objeto" id="objeto">
            <?php 
    while($objeto = mysqli_fetch_assoc($objetoGasto)) {
    ?>
            <option value="<?php echo $objeto['codigo'] ?>"><?php echo $objeto ['detalle']?></option>
            <?php
    }
    ?>
        </select><br>
                    <input class="inputs4" type="text" name="montoObjeto" id="montoObjeto">
                </div>
                <div class="otrosDatos">
                    <label for="">Paguese a la orden de</label><br>
                    <select class="ordenDe" name="proveedores" id="proveedores">
                        <?php while($proveedores = mysqli_fetch_assoc($tablaProveedores)): ?>
                            <option value="<?php echo $proveedores['codigo'] ?>"><?php echo $proveedores['nombre'] ?></option>
                        <?php endwhile; ?>
                    </select><br>
                    <label>La suma de</label><br>
                    <input class="sumaDe"  type="text" name="montoPagar" id="montoPagar">
                    <input class="sumaDe2" type="text" name="montoLetras" id="montoLetras"><br>
                    <label>Detalle</label><br>
                    <input class="detalle" type="text" name="descripcion" id="descripcion"> 
                </div>
                <div class="botones">
                    <button type="submit" id="grabarCheque" name="grabarCheque">Grabar</button>
                    <button type="button" onclick="resetearCampos()">Restablecer</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
