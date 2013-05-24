<?php
require_once("data.php");

$ArrayURL = split('/', $_SERVER['REQUEST_URI']); /* SuMi Modificaiton : Remove ) and add single quote before and after of REQUEST_URI */ 
$id = $ArrayURL[count($ArrayURL)-1]; /* SuMi Modificaiton : should use count($ArrayURL)-1 instead of fixed number */
$data = new propertyData();

if (is_object($data) == true) $status = '200 OK'; /* SuMi Modificaiton : should be == instead of = */
$status_header = "HTTP/1.1 {$status}";/* SuMi Modificaiton : Change single quote to double quote and add {} in order to replace variable in string */
header($status_header);

echo json_encode( $data->getAll($id) ); /* SuMi Modificaiton : change return to echo */

?>