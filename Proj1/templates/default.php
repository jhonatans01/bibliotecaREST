<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
/*if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
    }
    exit;
}*/

//$data = html_entity_decode(preg_replace("/u([0-9A-F]{4})/", "&#x\\1;", $data[0]['municipio']), ENT_NOQUOTES, 'UTF-8');
//$data = utf8_encode($data[0]['municipio']);*/
echo json_encode($data);