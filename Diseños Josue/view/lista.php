<!--autor: Josue Meza Rosado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Vida Animal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/CSS/styleLista.css">
</head>

<body>
<div class="main-content">
    <div class="top-container">
        <div class="header-bar">

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar factura...">
            </div>

            <h2 class="page-title">Factura</h2>

            <a href="#" class="btn-primary">
                <i class="fas fa-plus"></i> Realizar Factura
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Últimas Facturas
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mascota</th>
                        <th>Dueño</th>
                        <th>Ciudad</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($facturas as $f): ?>
                    <tr>
                        <td><?= $f['id'] ?></td>
                        <td><img src="<?= $f['mascota'] ?>" class="pet-avatar"></td>
                        <td><?= $f['dueno'] ?></td>
                        <td><?= $f['ciudad'] ?></td>
                        <td><?= $f['fecha'] ?></td>
                        <td>$<?= number_format($f['total'],2) ?></td>
                        <td>
                            <span class="badge <?= $f['estado']=='Pagado' ? 'badge-pagado':'badge-esperando' ?>">
                                <?= $f['estado'] ?>
                            </span>
                        </td>
                        <td class="actions">
                            <button class="btn-action edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-action delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
