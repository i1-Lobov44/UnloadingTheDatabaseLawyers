<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=lawsuit", "root", "root");
}
catch (PDOException $e) {
    echo $e->getMessage();
}

$lawyerName = isset($_POST['lawyer']) ? $_POST['lawyer'] : null;
$month = isset($_POST['month']) ? $_POST['month'] : null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h1>Выгрузка базы данных</h1>

    <div class="page-content">

        <div class="page-form">

            <form action="" method="POST">

                <div class="form-content">

                <label for="lawyer">Юрист</label>
                <select name="lawyer" id="">
                    <option value="Андреева">Андреева</option>
                    <option value="Иванов">Иванов</option>
                    <option value="Истомина">Истомина</option>
                    <option value="Павлов">Павлов</option>
                </select>

                </div>

                <div class="form-content">
                    <label for="month">Даты (период)</label>
                    <select name="month" id="">
                        <option value="1">Январь</option>
                        <option value="2">Февраль</option>
                        <option value="3">Март</option>
                        <option value="4">Апрель</option>
                    </select>
                </div>

                <div class="form-content">
                    <button type="submit">Выгрузить данные</button>
                </div>

            </form>
        </div>

        <div class="page-table">
            <table>
                <tr>
                    <td>Юрист</td>
                    <td>Категория</td>
                    <td>Дата начала</td>
                    <td>Гонорар, проценты</td>
                    <td>Размер иска, (руб.)</td>
                </tr>
                
                <?php

                switch($lawyerName) {
                    case 'Andreeva' : 
                        $lawyerName = 'Андреева';
                        break;
                    
                    case 'Istomina' : 
                        break;
                    
                }

                $category = [];
                $size = [];
                
                $sql = "SELECT * FROM `law`";

                $sql = is_null($lawyerName) && is_null($month) ? "SELECT * FROM `law`  ORDER BY `law`.`Категория` ASC" : "SELECT * FROM `law` WHERE `law`.`Юрист` = '$lawyerName' AND MONTH(`Дата начала`) = '$month'  ORDER BY `law`.`Категория` ASC";

                if($result = $conn->query($sql)) {
                    while($row = $result->fetch()) {
                        array_push($category, $row[1]);
                        array_push($size, $row[4]);

                        ?>

                        <tr>
                            <td><?=$row[0]?></td>
                            <td><?=$row[1]?></td>
                            <td><?=$row[2]?></td>
                            <td><?=$row[3]?></td>
                            <td><?=$row[4]?></td>
                        </tr>

                        <?php

                    }

                }

                $theMostFrequentCategory = array_count_values($category);
                arsort($theMostFrequentCategory);

                ?>


            </table>

            <p><i>Наиболее частая категория иска: <span class="additional-func"> <?= empty($theMostFrequentCategory) ? 0 : key($theMostFrequentCategory)?> </span> </i></p>
            <p><i>Максимальный размер иска: <span class="additional-func"><?= empty($size) ? 0 : max($size)?></span> </i></p>
        </div>

    </div>

    <h3>&copy; Copyright 2022</h3>

</body>

</html>