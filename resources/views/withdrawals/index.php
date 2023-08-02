<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="logo.ico">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Lista de Gastos</title>
</head>
<body>
    <h1>Lista de gastos</h1>
    <main>

<table>
    <th>Gastos</th>
    <?php foreach ($results as $result): ?>
    <tr>
        <td><?= "Gastaste " . $result["amount"] . "$ en: " . $result 
        ["description"] . "<br>";?></td>
    </tr>
    <?php endforeach; ?>

</table>
<a class="button-link" href="/incomes">Ingresos</a>

</main>

</body>
</html>