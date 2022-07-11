<?php

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