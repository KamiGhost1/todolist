<?php
header('content-type: aplication/json');
$data = file_get_contents('assets/data.json');
print($data);