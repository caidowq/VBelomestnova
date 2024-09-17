<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
function Calendar($month = null, $year = null)
{
    if ($month == null || $year == null) {
        $month = date('n');
        $year = date('Y');
    }
    $dayOne = new DateTime("$year-$month-01");
    $lastDay = new DateTime("$year-$month-" . $dayOne->format('t'));
    echo "<h2><span>" . $dayOne->format("F Y") . "</span></h2>";
    echo "<table>";
    echo "<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th class='weekends'>Сб</th><th class='weekends'>Вс</th></tr>";
    $firstDay = $dayOne->format('N') - 1;
    echo "<tr>";
    for ($i = 0; $i < $firstDay; $i++) {
        echo "<td></td>";
    }
    $currentDay = clone $dayOne;
    while ($currentDay <= $lastDay) {
        if ($currentDay->format('N') == 1) {
            echo "</tr><tr>";
        }
        $class = '';
        if (in_array($currentDay->format("N"), [6, 7])) {
            $class = 'weekends';
        }
        if (holiday($currentDay)) {
            $class .= ' holidays';
        }
        echo "<td class='$class'>" . $currentDay->format("j") . "</td>";
        $currentDay->add(new DateInterval('P1D'));
    }
    $lastWeekDay = $currentDay->format('N') - 1;
    for ($i = 0; $i < (7 - $lastWeekDay)%7; $i++) {
        echo "<td></td>";
    }
    echo "</tr>";
    echo "</table>";
}

function holiday(DateTime $date)
{
    $holidays = [
        '01-01', '01-02', '01-03', '01-04', '01-05', '01-06', '01-07','01-08','02-23','02-24','02-25','02-26','03-08','05-01','05-09','06-01','06-12','11-04','12-31'
    ];
    return in_array($date->format('m-d'), $holidays);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputMonth = $_POST["month"];
    $inputYear = $_POST["year"];
    Calendar($inputMonth, $inputYear);
}
else {
    Calendar();
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="month">Месяц: </label>
    <input type="number" name="month" min="1" max="12" required>
    <label for="year">Год: </label>
    <input type="number" name="year" required>
    <input type="submit" value="Показать календарь">
</form>
</body>
</html>