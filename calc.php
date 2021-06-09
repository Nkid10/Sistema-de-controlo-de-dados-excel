<?php 
error_reporting(0);
include 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory\createReader;
use PhpOffice\PhpSpreadsheet\style\conditional;

if (isset($_FILES["excel_file"]["name"]) && isset($_POST['calcular'])) {
if($_FILES["excel_file"]["name"] != '' && $var1=$_POST['xi']!= '' && $var2=$_POST['yi']!=''&& $_POST['Arrendonar']!='')
{
$var1=$_POST['xi'];
$var2=$_POST['yi'];
$arredondar=$_POST['Arrendonar'];
$p=count($var2);
 $allowed_extension =array('xlsx');
 $file_array = explode(".", $_FILES['excel_file']['name']);
 $file_extension= end($file_array);
 if(in_array($file_extension,$allowed_extension))
 {
 	$reader = PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
 	$spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
 	$writer =PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet,'Html');
 	
 }else{
 		include 'excelerror.php';
 }

}else{
	
	include 'excelerror.php';
}
	$worksheet = $spreadsheet->getActiveSheet();
	// Get the highest row and column numbers referenced in the worksheet
	$highestRow = $worksheet->getHighestRow(); // e.g. 10
	$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
	$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
	 $rows = $worksheet->toArray();

	for ($i=0; $i <$p ; $i++) {
		$va3=($var1[$i]*$var2[$i]);

		$va7=pow($var1[$i],2);

		$va4[]=$va3;

		$va5[]=$va7;

		$count=($i+1);

		$sumX=array_sum($var1);

		$sumY=array_sum($var2);

		$sumXiYi=array_sum($va4);


		$SumXX=array_sum($va5);

		$delta=($SumXX*$p)-($sumX*$sumX);

		$a=(($sumXiYi*$p)-($sumX*$sumY))/$delta;

		$b=(($SumXX*$sumY)-($sumXiYi*$sumX))/$delta;
	
}

}else{

	include 'excelerror.php';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Лабораторная работа 4</title>
	<link rel="stylesheet" type="text/css" href="css/calc.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:ital,wght@0,500;1,400;1,500;1,900&family=Roboto:ital,wght@0,500;1,300;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
	<div class="center">
	<div class="logo">
		<a href="index.php">Home</i></a>
	</div>
	<div class="Menu-desktop">
		<ul>
			<li><a href="index.php">Menu</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contact</a></li>
			
		</ul>
	</div>
</div>
</header>

<section class="showup">
	
	<div class="tabela">
		<div class="error"></div>
		<div class="True"></div>
		<table >
			<thead>
				<tr>
					<th>i</th>
					<th>xi</th>
					<th>yi</th>
					<th>(x^2)</th>
					<th>(xi*yi)</th>
					<th>(y_i)</th>
					<th>yi-y_i</th>
					<th>(yi-y_1)^2</th>
				</tr>
			</thead>
			<tbody>


		<tr>
<td>
	<?php 
						for ($i=0; $i <$p ; $i++) { 
							$count=($i+1);
						$block=($rows[$i+1][0]);
						if ($block == $count) {
			//valor de 1 ate quantidade determinado
			
			echo '<div class="True">'.$block;
		} else{
			
		
			echo '<div style="color:red">'.$block;
		}

}
	?></td>
					<td>
						<?php
					
					for ($i=0; $i <$p ; $i++) { 
						$block1=($rows[$i+1][1]);
		if ($block1 == $var1[$i]) {
			//valor de x
			
			echo '<div class="True">'.$block1;
		} else{
			
			
			echo '<div class="error">'.$block1;
		}

	}
	?>
		
	</td>
			<td>
				<?php 
				//Valor em y
				for ($i=0; $i <$p ; $i++) { 
						$block2=($rows[$i+1][2]);
		if ($block2 == $var2[$i]) {
		
			echo '<div class="True">'.$block2;
		} else{
			echo '<div class="error">'.$block2;
		}

	}
					 ?>
					 	
					 </td>


					<td>
						<?php 
						//multiplicacao de valor de x e y
						for ($i=0; $i <$p ; $i++) {
						$block3=($rows[$i+1][3]); 
					if ($block3 == $va5[$i]) {
					
			echo '<div class="True">'.$block3;
		} else{
			
			echo '<div class="error">'.$block3;
		}
			} ?>
						
					</td>
					 <td><?php 
					//multiplicacao de valor de x e y
					for ($i=0; $i <$p ; $i++) {
						$va3=($var1[$i]*$var2[$i]);
						$va4[]=$va3;
					 $block4=($rows[$i+1][4]);
					 if ($block4 == $va4[$i]) {
			
			echo '<div class="True">'.$block4;
		} else{
			
			echo '<div class="error">'.$block4;
		}
	}
	?></td>
					<td>
						<?php 
						for ($i=0; $i <$p ; $i++) { 
					$ml=round(($var1[$i]*$a+$b),$arredondar);
					$block5=($rows[$i+1][5]);
						if ($block5 == $ml) {
			
			echo '<div class="True">'.$block5;
		} else{
			
			echo '<div class="error">'.$block5;
		}

}

					 ?></td>
					  <td><?php
					  	for ($i=0; $i <$p ; $i++) {
					$ml=round(($var1[$i]*$a+$b),$arredondar); 
					$zl=round(($var2[$i]-$ml),$arredondar);
						$block6=($rows[$i+1][6]);
						if ($block6 == $zl) {
				
			echo '<div class="True">'.$block6;
		} else{
			
			echo '<div class="error">'.$block6;
		}

} ?></td>
					  <td><?php
					  	for ($i=0; $i <$p ; $i++) { 
						$block7=($rows[$i+1][7]);

					$ml=round(($var1[$i]*$a+$b),$arredondar); 
					$zl=round(($var2[$i]-$ml),$arredondar);
					$tp=round(pow($zl,2),$arredondar);
						if ($block7 == $tp) {
				
			echo '<div class="True">'.$block7 ;
		} else{
			
			echo '<div class="error">'.$block7 ;
		}

			}		  ?>
					  </td>
					 
				</tr>	
				
			</tbody>
		</table>
		<?php 
		echo "<br>";
		echo 'f(x)= '.round($a,$arredondar). 'x + '.round($b,$arredondar);
		echo '<br>';
		echo 'a = '.round($a,$arredondar);
		echo '<br>';
		echo 'b = '.round($b,$arredondar);
		echo '<br>'; 
		?>
	</div>
</section>
<footer>
	
</footer>
</body>
</html>