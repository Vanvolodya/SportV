<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$outp = '[ {"name":"Мяч для футболу SELECT Contra", "icon":"b1.jpg", "desc":"Ручний шов; мяч обладнано запатентованою компанією SELECT камерою Zero-Wing з подвійним бутильовим клапаном, який забезпечує стабільний баланс мяча в польоті; призначений для офіційних ігор і тренувань клубних команд; випускається в рамках CLUB SERIES (мячі для клубів); дуже міцний; мяч дуже легкий у прийомі та управлінні", "price":598},'.
			'{"name":"Мяч для футболу K-Sector Pro Team", "icon":"b2.jpg", "desc":"Мяч призначений для тренувань юніорських та дитячих команд; мяч виготовлено в Пакистані; 4-ьох шарове покриття PU, яке харктеризується низьким водопоглинанням і високою стійкістю до стирання; спеціальна багаторівнева армована система внутрішньої частини забезпечує зберігання форми м’яча під час ударів", "price":403},'.
			'{"name":"Мяч для футболу NIKE SABER", "icon":"b3.jpg", "desc":"Мяч рекомендований для ігор і тренувань професійних команд і клубів; ламіноване покриття PU, яке харктерізуеться низьким водопоглинанням і високою стійкістю до зносу; панелі зроблені зі спеціального поліуретанового волокна, схожого на піну, розробленого компанією Nike, що надає мячу відмінну мякість, він довше зберігає форму", "price":706},'.
			'{"name":"Мяч для футболу Joma Egeo 5", "icon":"b4.jpg", "desc":"Мяч виготовлено в Пакистані; ручний шов; кількість панелей - 32", "price":907},'.
			'{"name":"Мяч для футболу NIKE PREMIER TEAM FIFA", "icon":"b5.jpg", "desc":"Мяч рекомендований для ігор і тренувань професійних команд і клубів; ламіноване покриття PU, яке харктерізуеться низьким водопоглинанням і високою стійкістю до зносу; панелі зроблені зі спеціального поліуретанового волокна, схожого на піну, розробленого компанією Nike, що надає мячу відмінну мякість, він довше зберігає форму", "price":907} ]';
echo($outp);
?>

