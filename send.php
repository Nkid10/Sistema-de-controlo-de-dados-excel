<?php
	include 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Лабораторная работа 4</title>
	<link rel="stylesheet" type="text/css" href="css/send.css">
</head>
<body>
	<section>
		<div class="conditions">
			<?php
if (isset($_POST['enviar']) && isset($_POST['in_put']) ) {
	if ($_POST['in_put'] != '') {
$valor = $_POST['in_put'];
$method= $_POST['methods'];
switch ($method) {
	case 'Метод наименьших квадратов':
	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="calc.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;

		case 'гиперболическую':

	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="hip.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;

	case 'Степенную':
	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="step.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';


		break;
	case 'Показательную':
	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="pok.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';


		break;
	case 'Логарифмическую':
	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="log.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;
	case 'Дробно-Линеиную':
	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="drob.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;

	case 'Дробно-рационалную':

	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="drop.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;

		case 'квадратичную зависимость':

	echo '<table >';
	echo "<tr>";
	echo "<th>".'xi'."</th>";
	echo "<th>".'yi'."</th>";
	echo"</tr>";
		for ($i=0; $i <$valor ; $i++) {
		echo "<tr>";
		
		echo'<form action="kd.php" method="POST" enctype="multipart/form-data">';
		echo'<th>'.'<input type="text"  name="xi[]" >'.'</th>';
		echo'<th>'.'<input type="text"  name="yi[]">'.'</th>';



	}
	echo "</tr>";
	echo "<tr>";
	echo '<td>'.'<input type="text" placeholder="Округление по" name="Arrendonar">'.'</td>';
	echo'<td>'.'<input type="file"  name="excel_file">'.'</td>';
	echo"</tr>";

	
echo"</table>";
	echo'<td>'.'<input type="submit" placeholder="enviar" name=" calcular" >'.'</td>';
		echo'</form>';

		break;
	


	
}

	}else{
		
		include 'erronc.php';
	}
}

?>

		</div>
		
	</section>
</body>
</html>

