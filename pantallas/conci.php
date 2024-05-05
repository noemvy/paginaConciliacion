<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="mes">Seleccione un mes:</label>
        <select name="mes" id="mes" >
           <?php while($mes = mysqli_fetch_assoc($tablaMeses)) {
    ?>
            <option value="<?php echo $mes['mes'] ?>"><?php echo $mes ['nombre_mes']?></option>
            <?php
    }
            ?> 
            </select>
        <label for="anio">Seleccione el año:</label>
        <input type="number" id="anio" name="anio" min="2023" value="2023">
        <br>


        <input type="text" value="<?php echo $saldo_anterior?>">
        <input type="text" value="<?php echo $mas_deposito ?>">
        <input type="text" value="<?php echo $chequeAnulados ?>">
        <input type="text" value="<?php echo $notasCredito ?>">
        <input type="text" value="<?php echo $ajusteLibro ?>">
        <input type="text" value="<?php echo $subtotal1 ?>">
        <input type="text" value="<?php echo $chequesGirados ?>">
        <input type="text" value="<?php echo $notasDebito ?>">
        <input type="text" value="<?php echo $menosAjusteLibro ?>">
        <input type="text" value="<?php echo $subtotal2 ?>">
        <input type="text" value="<?php echo $saldoLibro ?>">
        <input type="text" value="<?php echo $saldoBanco ?>"> 
        <button type="submit">Verificar</button>
    </form>

</body>
</html> 