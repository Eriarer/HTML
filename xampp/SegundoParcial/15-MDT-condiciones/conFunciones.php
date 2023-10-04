<?php

function calcularPago($horas, $pago)
{
    if ($horas - 35 > 0 && $horas - 35 <= 5) {
        return 35 * $pago + ($horas - 35) * $pago * 2;
    } else if ($horas - 35 > 5) {
        return 35 * $pago + 5 * $pago * 2 + ($horas - 40) * $pago * 3;
    } else {
        return $horas * $pago;
    }
}

function calcularImpuesto($pago)
{
    if ($pago > 2000 && $pago <= 4000) {
        return $pago * 0.1;
    } else if ($pago > 4000) {
        return $pago * 0.2;
    }
    return 0;
}

function main()
{
    echo "<h1>Melgoza de la Torre Abraham</h1>";
    if (isset($_GET['hrs']) && isset($_GET['pago'])) {
        $horas = $_GET['hrs'];
        $pago = $_GET['pago'];
        $sueldo = calcularPago($horas, $pago);
        $impuesto = calcularImpuesto($sueldo);
        /*
        Horas trabajadas: xxx
        Pago por hora: xxx
        sueldo bruto: xx
        impuesto aplicado: xx
        sueldo neto: xxxx
         */
        echo "<h3>Horas trabajadas: $horas</h3>";
        echo "<h3>Pago por hora: $pago</h3>";
        echo "<h3>Sueldo bruto: $sueldo</h3>";
        echo "<h3>Impuesto aplicado: $impuesto</h3>";
        echo "<h3>Sueldo neto: " . ($sueldo - $impuesto) . "</h3>";
    } else {
        echo "<h3 style= 'background:red;color:black;'>Agregar a la url las variables hrs y pago</h3>";
        if (!isset($_GET['hrs'])) {
            echo "<h3 style= 'background:red;color:black;'>Faltan las horas trabajadas</h3>";
        }
        if (!isset($_GET['pago'])) {
            echo "<h3 style= 'background:red;color:black;'>Falta el pago por hora</h3>";
        }
    }
}

main();