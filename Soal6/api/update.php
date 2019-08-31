<?php
header("Content-type:application/json");
require 'config_db.php';
$sql = "UPDATE user SET name = '" . $_POST['name'] . "',id_work = '" . $_POST['work'] . "',id_salary = '" . $_POST['salary'] . "' WHERE id = '" . $_POST['id'] . "'";
$result = $mysqli->query($sql);
$sql = "SELECT * FROM user WHERE id = '" . $_POST['id'] . "'";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
echo json_encode($data, JSON_PRETTY_PRINT);