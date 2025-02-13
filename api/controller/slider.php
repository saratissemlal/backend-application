<?php

$data = $db->select("CONCAT('".WEBROOT. "theme/assets/img/slider/', nameI) AS image", "image")->where("typeI = 'slider'")->get();

API::success(["data" => $data]);