<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=lawsuit", "root", "root");
}
catch (PDOException $e) {
    echo $e->getMessage();
}

$lawyerName = isset($_POST['lawyer']) ? $_POST['lawyer'] : null;
$month = isset($_POST['month']) ? $_POST['month'] : null;