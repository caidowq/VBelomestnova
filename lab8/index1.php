<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <h1>Таблица умножения</h1>
        <table>
            <tr>
                <th>&nbsp;</th>
                <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<th>$i</th>";
                    }
                ?>
            </tr>
            <?php
                for ($i = 0; $i <= 10; $i++) {
                    echo "<tr><th>$i</th>";
                    for ($j = 0; $j <= 10; $j++) {
                        echo "<td>".($i * $j)."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>