<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Lista de ingresos</title>
</head>
<body>
    <h1>Lista de ingresos</h1>
    <main>

<table>
    <tr>
        <th>Método de pago</th>
        <th>Tipo de ingreso</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Descripción</th>
    </tr>

        <!-- La variable $result la tenemos en en contrlador de 
        incomes en el metodo index -->
        <?php foreach($results as $result): ?>
        <tr>
            <td><?= $result["payment_method"] ?></td>
            <td><?= $result["type"] ?></td>
            <td><?= $result["date"] ?></td>
            <td><?= $result["amount"] ?></td>
            <td><?= $result["description"] ?></td>
        </tr>
        <?php endforeach; ?>

</table>

<a class="button-link" href="/incomes/create">Añadir nuevo ingreso</a>
<a class="button-link" href="/withdrawals">Ir a Gastos</a>
</main>

</body>
</html>