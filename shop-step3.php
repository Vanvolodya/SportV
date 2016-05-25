<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$outp = '[ {"name":"Ноутбук Lenovo IdeaPad 100-14", "icon":"lenovoIdeaPad10014.jpg", "desc":"Екран 14 (1366x768) HD LED, глянцевий / Intel Celeron N2840 (2.16 - 2.58 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / LAN / Wi-Fi / веб-камера / DOS / 1.9 кг / чорний", "price":5999},'.
			'{"name":"Ноутбук HP 255 G4", "icon":"HP255G4.jpg", "desc":"Екран 15.6 (1366x768) HD LED, матовий / AMD Dual-Core E1-6015 (1.4 ГГц) / RAM 2 ГБ / HDD 500 ГБ / AMD Radeon R2 / LAN / Wi-Fi / Bluetooth / веб-камера / Linux / 2.15 кг / чорний", "price":6099},'.
			'{"name":"Ноутбук Dell Inspiron 3542", "icon":"DellInspiron3542.jpg", "desc":"Екран 15.6 (1366x768) WXGA HD LED, глянцевий / Intel Celeron 2957U (1.4 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linux / 2.4 кг / чорний", "price":6777} ]';
echo($outp);
?>

