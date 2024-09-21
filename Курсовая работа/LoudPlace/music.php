<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imeges/x icon" href="favicon/L.ico">
    <style>
        body {
            text-align: center;
        }

        a {
            font-size: 24px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    require_once('db.php');

    if (!isset($_SESSION['user_id'])) {
        header("Location: index.html");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $sql_role = "SELECT role FROM users WHERE id=$user_id";
    $result_role = $conn->query($sql_role);

    if ($result_role->num_rows > 0) {
        $user_role = $result_role->fetch_assoc()['role'];

        if ($user_role === 'admin') {
            echo '<a href="admin.php"><br>Перейти в карточку артиста</a>';
        }
    }
    ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="musicstyles.css">
    <title>LoudPlace</title>
    <link rel="icon" type="imeges/x icon" href="favicon/L.ico">
</head>
<body>
    <div class="musiccontainer">
        <h2>LoudPlace</h2>
    </div>

    <div class="musiccontainer">
        <h3>Лучшие композиции</h3>
    </div>

    <div class="musiccontainer">
        <div class="music">
            <img src="face.png" width="800" height="700">
            <h3>face- забирай все, что хочешь</h3>
            <p> Иван Дрёмин родился 8 апреля 1997 года в Уфе. Его родители развелись, когда ему ещё не было года.
                <br>Отец Тимофей Дрёмин родился в 1968 году, в 1980-е был фарцовщиком в Ленинграде, в 1990-е годы — владельцем ларьков и кафе в Уфе, позже стал грузчиком. Мать после развода стала много времени уделять церкви.
                </p>
                <audio  controls="controls">
                        <source src="face.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>

        <div class="music">
            <img src="монеточка.png" width="800" height="700">
            <h3>Монеточка - Я Лиза</h3>
            <p> Российская певица, музыкант, композитор и автор песен.
                <br>Родилась 1 июня 1998 года в Екатеринбурге.
                <br>В 2016 году поступила на заочное отделение ВГИКа (Всероссийский государственный институт кинематографии, Москва) по специальности «продюсирование». </p>
                <audio  controls="controls">
                        <source src="монеточка.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>
        <div class="music">
        <img src="eminem.jpg" width="800" height="700">
            <h3>Eminem - Superman</h3>
            <p> Эминем (Маршалл Брюс Мэтерс III) (1972) – рэп-исполнитель, актер, продюсер, обладатель премии «Оскар».
                <br>Родился Эминем 17 октября 1972 года в Сент-Джозефе штата Миссури. Отец оставил семью, когда Маршаллу не было и года. С тех пор мальчик вместе с мамой много переезжал, жил у родственников. 
                <br>Затем семья обосновалась в Детройте, но и там Маршаллу было нелегко – он часто менял школы, попадал в драки. Увлекшись рэпом, Маршалл уже в 13 лет придумывал песни, а в 15 основал свою группу.
            </p>
            <audio  controls="controls">
                        <source src="eminem.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>

        <div class="music">
            <img src="gaga.jpg" width="800" height="700">
            <h3>Lady Gaga - Poker Face</h3>
            <p> Ле́ди Га́га (англ. Lady Gaga; настоящее имя — Сте́фани Джоа́нн Анджели́на Джермано́тта (англ. Stefani Joanne Angelina Germanotta), род. 28 марта 1986, Нью-Йорк, США) — американская певица, автор песен, продюсер, филантроп и актриса. Имеет множество наград, среди которых шесть премий «Грэмми», 13 MTV Video Music Awards и 8 MTV Europe Music Awards, а также занимает четвёртое место в списке 100 величайших женщин в музыке по версии VH1. Журнал Time назвал исполнительницу одной из самых влиятельных личностей в мире.</p>
            <audio  controls="controls">
                        <source src="gaga.mp3" type="audio/mpeg">
                        Установите гугл хром, ваш браузер плохой
                    </audio>
        </div>



        <div class="container">
        <h3 align="center" style="color:#000000">Новая композиция!</h3>
        </div>




         <?php
        $sql_music = "SELECT * FROM music";
        $result_music = $conn->query($sql_music);
        if ($result_music->num_rows > 0) {
            while ($row = $result_music->fetch_assoc()) {
                echo '<div class="music">';
                echo '<img src="' . $row['photo_path'] . '" alt="' . $row['name'] . '" width="800" height="700">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '' . $row['opisanie'] . '<br>' ;
                echo '<audio  controls="controls"> <source src="' . $row['music_path'] .'" type=audio/mpeg> </audio>';
                echo '</div>';
            }
        } else {
            echo '<div class="container"> <p align="center" style="color:#000000">Нет новых хитов(добавь свою неповторимую композицую, но это может сделать только подтврежденный дистрибьютор, то есть admin)</p> </div>';
        }
        $conn->close();
        ?>
    </div>
    <div class="container">
                <h3>Твой профиль</h3>
                <a href="dashboard.php">Редактор профиля</a>
    </div>    
</body>
</html>
