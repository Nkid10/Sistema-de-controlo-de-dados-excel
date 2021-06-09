<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Лабораторная работа 4</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:ital,wght@0,500;1,400;1,500;1,900&family=Roboto:ital,wght@0,500;1,300;1,900&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="center">
		<div class="logo">
			<h1><a href="index.php">Logo</a></h1>
		</div>
		<div class="menu-desktop">
			<ul>
				
				<li><a href="help.php">Help</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
	</header>
	<section class="conteudo">
		<h1>добро пожаловать</h1>
		<span> Этот сайт был разработан с целью проверки точности расчетов С помощью метода наименьших квадратов построить эмпирические формулы, используя аппроксимирующие зависимости,однако существует несколько основных правил использования странице <a href="help.php">Читать дальше</a></span>
	</section>
	<section class="form">
<form action="send.php" method="POST" enctype="mult-part">
		Выберите функции <select name="methods" id="Method">
	 <option value="Метод наименьших квадратов">Метод наименьших квадратов</option>
		
		<option  disabled="Квалинейным двухпараметрическую функции">
			Квалинейным двухпараметрическую  функции 
		</option>
		<option value="гиперболическую">гиперболическую</option>
		<option value="Степенную">Степенную</option>
		<option value="Показательную">Показательную</option>
		<option value="Логарифмическую">Логарифмическую</option>
		<option value="Дробно-Линеиную">Дробно-Линеиную</option>
		<option value="Дробно-рационалную">Дробно-рационалную</option>
		<option  disabled="Квалинейным двухпараметрическую функции">
			Квалинейным двухпараметрическую  функции 
		</option>
		<option value="квадратичную зависимость">квадратичную зависимость</option>
	</select>

	Количество строк исходных данных <input type="text"name="in_put">
	

	<input type="submit" placeholder="Отправить" name=" enviar">
</form>
<div class="clear"></div>
</section>
<footer>
	<div class="center">

	</div>
</footer>
</body>
</html>