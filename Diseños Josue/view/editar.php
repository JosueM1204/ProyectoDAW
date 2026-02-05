<!--autor: Josue Meza Rosado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Factura - Vida Animal</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/styleEditar.css">
</head>

<body>

<form method="POST">
    <div class="window">

        <h2>Editar Factura</h2>
        <hr>

        <?php if ($mensaje): ?>
            <div>
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="field">
                <label>N° Factura</label>
                <input
                    name="numero_factura"
                    placeholder="FAC-01"
                    value="<?= htmlspecialchars($factura["numero_factura"]) ?>"
                >
            </div>

            <div class="field">
                <label>Fecha de Emisión</label>
                <input
                    type="date"
                    name="fecha_emision"
                    value="<?= htmlspecialchars($factura["fecha_emision"]) ?>"
                >
            </div>

            <div class="field">
                <label>Estado</label>

                <div class="estado-group">
                    <label>
                        <input
                            type="checkbox"
                            name="estado_pagada"
                            <?= $factura["estado"] === "Pagada" ? "checked" : "" ?>
                        >
                        Pagada
                    </label>

                    <label>
                        <input
                            type="checkbox"
                            name="estado_pendiente"
                            <?= $factura["estado"] === "Pendiente" ? "checked" : "" ?>
                        >
                        Pendiente
                    </label>
                </div>
            </div>
        </div>

        <hr>

        <h4>Datos Cliente</h4>

        <button type="button" class="btn-search">Buscar Cliente</button>

        <div class="row">
            <div class="field">
                <label>Nombre</label>
                <input
                    name="cliente_nombre"
                    value="<?= htmlspecialchars($factura["cliente_nombre"]) ?>"
                >
            </div>

            <div class="field">
                <label>Cédula</label>
                <input
                    name="cliente_cedula"
                    value="<?= htmlspecialchars($factura["cliente_cedula"]) ?>"
                >
            </div>

            <div class="field">
                <label>Teléfono</label>
                <input
                    name="cliente_telefono"
                    value="<?= htmlspecialchars($factura["cliente_telefono"]) ?>"
                >
            </div>
        </div>

        <div class="row">
            <div class="field">
                <label>Email</label>
                <input
                    name="cliente_email"
                    value="<?= htmlspecialchars($factura["cliente_email"]) ?>"
                >
            </div>

            <div class="field">
                <label>Dirección</label>
                <input
                    name="cliente_direccion"
                    value="<?= htmlspecialchars($factura["cliente_direccion"]) ?>"
                >
            </div>

            <div class="field">
                <label>Forma de Pago</label>
                <select name="forma_pago">
                    <option value="" disabled <?= $formaPago === "" ? "selected" : "" ?>>
                        Seleccione una forma de pago
                    </option>
                    <option value="Efectivo" <?= $formaPago === "Efectivo" ? "selected" : "" ?>>
                        Efectivo
                    </option>
                    <option value="Transferencia" <?= $formaPago === "Transferencia" ? "selected" : "" ?>>
                        Transferencia
                    </option>
                    <option value="Tarjeta" <?= $formaPago === "Tarjeta" ? "selected" : "" ?>>
                        Tarjeta
                    </option>
                </select>
            </div>
        </div>

        <hr>

        <h4>Detalle de Servicios Prestados</h4>

        <div class="services">
            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($servicios as $s): ?>
                            <tr>
                                <td><?= htmlspecialchars($s["nombre"]) ?></td>
                                <td>$<?= money($s["precio"]) ?></td>
                                <td>$<?= money($s["precio"]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cost-box">
                <label>Subtotal</label>
                <input name="subtotal" value="<?= money($subtotal) ?>" readonly>

                <label>IVA (15%)</label>
                <input name="iva" value="<?= money($iva) ?>" readonly>

                <label>TOTAL A PAGAR</label>
                <input name="total" value="<?= money($total) ?>" readonly>
            </div>
        </div>

        <hr>

        <div class="panel-btn">
            <button type="button" class="btn cancel" onclick="window.location.href='index.php';">
                Cancelar
            </button>
            <button type="submit" class="btn save">
                Guardar
            </button>
        </div>

    </div>
</form>

</body>
</html>