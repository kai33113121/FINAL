<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Intercambios - LibrosWap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>🔁 Mis intercambios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>📤 Ofrecido por</th>
                    <th>📚 Libro ofrecido</th>
                    <th>🎯 Solicitado a</th>
                    <th>📖 Libro solicitado</th>
                    <th>📌 Estado</th>
                    <th>🕒 Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($intercambios as $i): ?>
                    <tr>
                        <td><?= htmlspecialchars($i['nombre_ofrece']) ?></td>
                        <td><?= htmlspecialchars($i['libro_ofrecido']) ?></td>
                        <td><?= htmlspecialchars($i['nombre_recibe']) ?></td>
                        <td><?= htmlspecialchars($i['libro_solicitado']) ?></td>
                        <td><?= $i['estado'] ?></td>
                        <td><?= $i['fecha'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>