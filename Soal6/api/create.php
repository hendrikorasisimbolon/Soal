<?php
header("Content-type:application/json");
require 'config_db.php';
$sql = "INSERT INTO user (name,id_work,id_salary) VALUES ('" . $_POST['name'] . "','" . $_POST['work'] . "','" . $_POST['salary'] . "')";
$result = $mysqli->query($sql);
$sql = "SELECT * FROM user Order by id desc LIMIT 1";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
echo json_encode($data, JSON_PRETTY_PRINT);