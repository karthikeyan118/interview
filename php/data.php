<?php
include_once('../classes/data.class.php');
$data = new data();
$result = $data->myLists();
$allData = array();
while($row = $result->fetchAll(PDO::FETCH_ASSOC)){
    $allData = $row;
}
echo json_encode($allData);
?>
