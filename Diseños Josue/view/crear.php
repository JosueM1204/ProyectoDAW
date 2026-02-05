<!--autor: Josue Meza Rosado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Factura - Vida Animal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/CSS/styleCrear.css">
</head>

<body>

<form method="POST" id="formFactura">
    <div class="window">

        <h2>Nueva Factura</h2>
        <hr>

        <?php if ($mensaje): ?>
            <div>
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <!-- Datos principales -->
        <div class="row">
            <div class="field">
                <label>N° Factura</label>
                <input 
                    name="numero_factura" 
                    placeholder="FAC-01"
                    value="<?= htmlspecialchars(post('numero_factura')) ?>"
                >
            </div>

            <div class="field">
                <label>Fecha de Emisión</label>
                <input type="date" name="fecha_emision" value="<?= htmlspecialchars(post('fecha_emision')) ?>">
            </div>
        </div>

        <hr>

        <!-- Datos Cliente -->
        <h4>Datos Cliente</h4>

        <div class="row row-buttons">
            <button type="button" class="btn-search">Buscar Cliente</button>
            <button type="button" class="btn-edit-client">Editar</button>
        </div>

        <div class="row">
            <div class="field">
                <label>Nombre</label>
                <input name="cliente_nombre" value="<?= htmlspecialchars(post('cliente_nombre')) ?>">
            </div>

            <div class="field">
                <label>Cédula</label>
                <input name="cliente_cedula" value="<?= htmlspecialchars(post('cliente_cedula')) ?>">
            </div>

            <div class="field">
                <label>Teléfono</label>
                <input name="cliente_telefono" value="<?= htmlspecialchars(post('cliente_telefono')) ?>">
            </div>
        </div>

        <div class="row">
            <div class="field">
                <label>Email</label>
                <input type="email" name="cliente_email" value="<?= htmlspecialchars(post('cliente_email')) ?>">
            </div>

            <div class="field">
                <label>Dirección</label>
                <input name="cliente_direccion" value="<?= htmlspecialchars(post('cliente_direccion')) ?>">
            </div>

            <div class="field">
                <label>Forma de Pago</label>
                <select name="forma_pago">
                    <option value="" disabled <?= post('forma_pago') === '' ? 'selected' : '' ?>>
                        Seleccione una forma de pago
                    </option>
                    <option value="Efectivo" <?= post('forma_pago') === 'Efectivo' ? 'selected' : '' ?>>
                        Efectivo
                    </option>
                    <option value="Transferencia" <?= post('forma_pago') === 'Transferencia' ? 'selected' : '' ?>>
                        Transferencia
                    </option>
                    <option value="Tarjeta" <?= post('forma_pago') === 'Tarjeta' ? 'selected' : '' ?>>
                        Tarjeta
                    </option>
                </select>
            </div>
        </div>

        <hr>

        <!-- Datos Mascota -->
        <h4>Datos de la Mascota</h4>

        <div class="row">
            <div class="field">
                <label>Mascotas Asociadas</label>
                <select name="mascota">
                    <option value="" disabled <?= post('mascota') === '' ? 'selected' : '' ?>>
                        Seleccione una mascota
                    </option>
                    <option value="Firulais" <?= post('mascota') === 'Firulais' ? 'selected' : '' ?>>
                        Firulais
                    </option>
                </select>
            </div>

            <div class="field">
                <label>Tipo de Trámite</label>
                <select name="tipo_tramite">
                    <option value="" disabled <?= post('tipo_tramite') === '' ? 'selected' : '' ?>>
                        Seleccione un trámite
                    </option>
                    <option value="Consulta" <?= post('tipo_tramite') === 'Consulta' ? 'selected' : '' ?>>
                        Consulta
                    </option>
                    <option value="Vacunación" <?= post('tipo_tramite') === 'Vacunación' ? 'selected' : '' ?>>
                        Vacunación
                    </option>
                    <option value="Cirugía" <?= post('tipo_tramite') === 'Cirugía' ? 'selected' : '' ?>>
                        Cirugía
                    </option>
                </select>
            </div>
        </div>

        <hr>

        <!-- Servicios -->
        <h4>Detalle de Servicios Prestados</h4>

        <div class="services">
            <div class="table-box">
                <button type="button" class="btn-add" onclick="togglePanel()">+</button>

                <table>
                    <thead>
                        <tr>
                            <th>Servicio</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody id="tablaServicios">
                        <?php foreach ($servicios as $s): ?>
                            <tr>
                                <td><?= htmlspecialchars($s['nombre']) ?></td>
                                <td>$<?= money($s['precio']) ?></td>
                                <td>$<?= money($s['precio']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="cost-box">
                <label>Servicios adicionales</label>
                <input name="servicios_adicionales" value="<?= htmlspecialchars(post('servicios_adicionales')) ?>">

                <label>Subtotal</label>
                <input name="subtotal" value="<?= money($subtotal) ?>" readonly>

                <label>IVA (15%)</label>
                <input name="iva" value="<?= money($iva) ?>" readonly>

                <label>TOTAL A PAGAR</label>
                <input name="total" value="<?= money($total) ?>" readonly>
            </div>
        </div>

        <div id="extrasHidden"></div>

        <hr>

        <!-- Botones finales -->
        <div class="panel-btn">
            <button type="button" class="btn cancel" onclick="window.location.href='index.php';">
                Cancelar
            </button>

            <button type="submit" class="btn save" name="guardar_factura" value="1">
                Guardar
            </button>
        </div>

    </div>
</form>

<!-- Panel lateral -->
<div class="panel" id="panel">
    <button type="button" class="cerrar" onclick="togglePanel()">✖</button>

    <h4>Servicios Adicionales</h4>

    <label>Servicio</label>
    <input id="servicio">

    <label>Precio Unitario</label>
    <input
        id="precio"
        type="number"
        step="0.01"
        inputmode="decimal"
        placeholder="0.00"
    >

    <button type="button" class="btn save" onclick="agregarServicio()">
        Guardar Servicio
    </button>
</div>

<script>
    function togglePanel() {
        document.getElementById("panel").classList.toggle("active");
    }

    function agregarServicio() {
        const nombre = document.getElementById("servicio").value.trim();
        const precio = parseFloat(document.getElementById("precio").value);

        if (!nombre || !precio || precio <= 0) return;

        const tabla = document.getElementById("tablaServicios");
        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${escapeHtml(nombre)}</td>
            <td>$${precio.toFixed(2)}</td>
            <td>$${precio.toFixed(2)}</td>
        `;

        tabla.appendChild(tr);

        const extrasHidden = document.getElementById("extrasHidden");

        const inNombre = document.createElement("input");
        inNombre.type = "hidden";
        inNombre.name = "servicio_nombre[]";
        inNombre.value = nombre;

        const inPrecio = document.createElement("input");
        inPrecio.type = "hidden";
        inPrecio.name = "servicio_precio[]";
        inPrecio.value = precio.toFixed(2);

        extrasHidden.appendChild(inNombre);
        extrasHidden.appendChild(inPrecio);

        document.getElementById("servicio").value = "";
        document.getElementById("precio").value = "";

        togglePanel();
    }

    function escapeHtml(str) {
        return str.replace(/[&<>"']/g, (m) => ({
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            "\"": "&quot;",
            "'": "&#039;"
        }[m]));
    }
</script>

</body>
</html>
