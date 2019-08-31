<?php
header("Content-type:application/json");
require 'config_db.php';
$num_rec = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $num_rec;
$sqlTotal = "SELECT * FROM user";
$sql = "SELECT user.id,user.name,salary,work.name as work FROM user JOIN work ON user.id_work=work.id JOIN kategori ON user.id_salary=kategori.id Order By user.id desc LIMIT $start_from, $num_rec";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['data'] = $json;
$result = mysqli_query($mysqli, $sqlTotal);
$data['total'] = mysqli_num_rows($result);
echo json_encode($data, JSON_PRETTY_PRINT);