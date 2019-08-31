<?php
header("Content-type:application/json");
require 'config_db.php';
$sql = "DELETE FROM user WHERE id = '" . $_POST['id'] . "'";
$result = $mysqli->query($sql);
echo json_encode([$_POST['id']], JSON_PRETTY_PRINT);