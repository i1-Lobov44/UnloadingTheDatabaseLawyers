<?php require_once('db.php')?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyers</title>
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
                
                <?php require_once('table.php')?>

            </table>

            <p><i>Наиболее частая категория иска: <span class="additional-func"> <?= empty($theMostFrequentCategory) ? 0 : key($theMostFrequentCategory)?> </span> </i></p>
            <p><i>Максимальный размер иска: <span class="additional-func"><?= empty($size) ? 0 : max($size)?></span> </i></p>
        </div>

    </div>

    <h3>&copy; Copyright 2022</h3>

</body>

</html>