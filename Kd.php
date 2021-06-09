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

		$va1=pow($var1[$i], 2);
		$ar1[]=$va1;

		$va2=pow($var1[$i], 3);
		$ar2[]=$va2;

		$va3=pow($var1[$i], 4);
		$ar3[]=$va3;

		$va5=$var1[$i]*$var2[$i];
		$ar5[]=$va5;

		$va6=$var1[$i]*$va5;;
		$ar6[]=$va6;

		$smux=array_sum($var1);
		
		$SumXX=array_sum($ar1);
		$SumXXX=array_sum($ar2);
		$SumXXXX=array_sum($ar3);
		
		$sumY=array_sum($var2);
		$sumXiYi=array_sum($ar5);
		$SumXYiYi=array_sum($ar6);

		$delta=($SumXXXX*$SumXX*$p+$smux*$SumXX*$SumXXX+$SumXX*$SumXXX*$smux)-($SumXX*$SumXX*$SumXX+$smux*$smux*$SumXXXX+$p*$SumXXX*$SumXXX);

		$a=(($SumXYiYi*$SumXX*$p+$SumXXX*$smux*$sumY+$SumXX*$sumXiYi*$smux)-($SumXX*$SumXX*$sumY+$smux*$smux*$SumXYiYi+$p*$sumXiYi*$SumXXX))/$delta;
		$b=(($SumXXXX*$sumXiYi*$p+$SumXYiYi*$smux*$SumXX+$SumXX*$SumXXX*$sumY)-($SumXX*$sumXiYi*$SumXX+$sumY*$smux*$SumXXXX+$p*$SumXXX*$SumXYiYi))/$delta;
		$c=(($SumXXXX*$SumXX*$sumY+$SumXXX*$sumXiYi*$SumXX+$SumXYiYi*$SumXXX*$smux)-($SumXX*$SumXX*$SumXYiYi+$smux*$sumXiYi*$SumXXXX+$SumXXX*$SumXXX*$sumY))/$delta;
		
		$fx=$a*pow($var1[$i], 2)+$b*$var1[$i]+$c;
		$di=$var2[$i]-$fx;
		$YT=pow($di, 2);
}
}else{

	include 'excelerror.php';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Лабораторная работа 4</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:ital,wght@0,500;1,400;1,500;1,900&family=Roboto:ital,wght@0,500;1,300;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/log.css">
	
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
					<th>X^2</th>
					<th>X^3</th>
					<th>X^4</th>
					<th>(xi*yi)</th>
					<th>xi*yi^2</th>
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
						for ($i=0; $i <$p ; $i++) {
							$va1=pow($var1[$i], 2);
							$ar1[]=round($va1,$arredondar);
						$block3=round(($rows[$i+1][3]),$arredondar); 
					if ($block3 == $ar1[$i]) {
					
			echo '<div class="True">'.$block3;
		} else{
			
			echo '<div class="error">'.$block3;
		}
			} ?>
						
					</td>
					 <td><?php 
					for ($i=0; $i <$p ; $i++) {
						$va2=pow($var1[$i], 3);
						$ar2[]=round($va2,$arredondar);
					 $block4=round(($rows[$i+1][4]),$arredondar);
					 if ($block4 == $ar2[$i]) {
			
			echo '<div class="True">'.$block4 ;
		} else{
			
			echo '<div class="error">'.$block4 ;
		}
	}
	?></td>
					<td>
						<?php 
						for ($i=0; $i <$p ; $i++) { 
						$va3=pow($var1[$i], 4);
							$ar3[]=round($va3,$arredondar);
					$block5=round(($rows[$i+1][5]),$arredondar);
						if ($block5 ==$ar3[$i]) {
			
			echo '<div class="True">'.$block5;
		} else{
			
			echo '<div class="error">'.$block5;
		}

}

					 ?></td>


					 <td>
						<?php 
						for ($i=0; $i <$p ; $i++) { 
					$va5=$var1[$i]*$var2[$i];
							$ar5[]=round($va5,$arredondar);
					$block6=round(($rows[$i+1][6]),$arredondar);
						if ($block6 ==$ar5[$i] ) {
			
			echo '<div class="True">'.$block6;
		} else{
			
			echo '<div class="error">'.$block6;
		}

}

					 ?></td>
					  <td><?php
					  	for ($i=0; $i <$p ; $i++) {
						$va6=round(($var1[$i]*pow($var2[$i], 2)),$arredondar);
						$ar6[]=round($va6,$arredondar);
						$block7=round(($rows[$i+1][7]),$arredondar);
						if ($block7 ==$ar6[$i]) {
				
			echo '<div class="True">'.$block7;
		} else{
			
			echo '<div class="error">'.$block7;
		}

} ?></td>
					  <td><?php
					  	for ($i=0; $i <$p ; $i++) { 
						$block8=round(($rows[$i+1][8]),$arredondar);
					$fx=round(($a*pow($var1[$i], 2)+$b*$var1[$i]+$c),$arredondar);

						if ($block8 == $fx) {
				
			echo '<div class="True">'.$block8 ;
		} else{
			
			echo '<div class="error">'.$block8 ;
		}

			}		  ?>
					  </td>
					    <td><?php
					  	for ($i=0; $i <$p ; $i++) { 
						$block9=round(($rows[$i+1][9]),$arredondar);
						$fx=round(($a*pow($var1[$i], 2)+$b*$var1[$i]+$c),$arredondar);
						$di=round(($var2[$i]-$fx),$arredondar);
						if ($block9 == $di) {
				
			echo '<div class="True">'.$block9 ;
		} else{
			
			echo '<div class="error">'.$block9 ;
		}

			}		  ?>
					  </td>
					    <td><?php

					  	for ($i=0; $i <$p ; $i++) { 
						$block10=round(($rows[$i+1][10]),$arredondar);
						$fx=round(($a*pow($var1[$i], 2)+$b*$var1[$i]+$c),$arredondar);
						$di=round(($var2[$i]-$fx),$arredondar);
						$YT=round(pow($di, 2),$arredondar);
						if ($block10 == $YT) {
				
			echo '<div class="True">'.$block10 ;
		} else{
			
			echo '<div class="error">'.$block10;
		}

			}		  ?>
					  </td>
					 
				</tr>	
				
			</tbody>
		</table>
		<?php 
		echo "<br>";
		echo 'f(x)= '.round($a,$arredondar). '*X + '.'('.round($b,$arredondar).')';
		echo '<br>';
		echo 'a = '.round($a,$arredondar);
		echo '<br>';
		echo 'b = '.round($b,$arredondar);
		echo '<br>'; 
		echo 'c = '.round($c,$arredondar);
		?>
	</div>
</section>
<footer>
	
</footer>
</body>
</html>