<?php 
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
		$exp=pow($var1[$i],2);
		$va3=round(log($var2[$i]),$arredondar);
		$va4[]=round($va3,$arredondar);
		$va5[]=round($exp,$arredondar);

		$ml=round(($va4[$i]*$var1[$i]),$arredondar);
		$va8[]=round($ml,$arredondar);
		$count=($i+1);

		$sumXi=array_sum($var1);

		$sumY=array_sum($va4);

		$sumXiYi=array_sum($va8);

		$SumXX=array_sum($va5);

		$delta=($SumXX*$p)-($sumXi*$sumXi);

		$a=(($sumXiYi*$p)-($sumXi*$sumY))/$delta;

		$b=(($SumXX*$sumY)-($sumXi*$sumXiYi))/$delta;
		$yp[]=$var1[$i];
		
}

for ($i=0; $i <$p ; $i++) { 

	$itp=exp($b)*exp($var1[$i]*$a);
	 $zl=round(($var2[$i]- $itp),$arredondar);
	
}

}else{

	include 'excelerror.php';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculatiom</title>
	<link rel="stylesheet" type="text/css" href="css/pok.css">
	
</head>
<body>
<header>
	<div class="logo">
		<a href="index.php">Logo</i></a>
	</div>
	<div class="Menu-desktop">
		<ul>
			<li><a href="index.php">Menu</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contact</a></li>
			
		</ul>
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
					<th>Yi=ln(yi)</th>
					<th>X^2</th>
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
						$block1=round(($rows[$i+1][1]),$arredondar);
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
				//valor de y
				for ($i=0; $i <$p ; $i++) { 
						$block2=round(($rows[$i+1][2]),$arredondar);
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
						//x=ln(xi)
						for ($i=0; $i <$p ; $i++) {
						$block3=round(($rows[$i+1][3]),$arredondar); 
					if ($block3 == $va4[$i]) {
					
			echo '<div class="True">'.$block3;
		} else{
			
			echo '<div class="error">'.$block3;
		}
			} ?>
						
				</td>
					
					<td>
						<?php 
						//=X^2
						for ($i=0; $i <$p ; $i++) { 
					$exp=pow($var1,2);
					$va5[]=round($exp,$arredondar);
					$block4=round(($rows[$i+1][4]),$arredondar);
						if ($block4 == 	$va5[$i]) {
			
			echo '<div class="True">'.$block4;
		} else{
			
			echo '<div class="error">'.$block4;
		}

}

					 ?></td>

					 <td>

						<?php 
						// =ln(x)
						for ($i=0; $i <$p ; $i++) { 
					$ml=round(($va4[$i]*$var1[$i]),$arredondar);
					$va8[]=round($ml,$arredondar);
					$block5=round(($rows[$i+1][5]),$arredondar);
						if ($block5 == $ml) {
			
			echo '<div class="True">'.$block5;
		} else{
			
			echo '<div class="error">'.$block5;
		}

}

					 ?>
					 	
					 </td>

					 <td>
					 <?php 
						// f(x)
						for ($i=0; $i <$p ; $i++) { 
					$itp=round((exp($b)*exp($var1[$i]*$a)),$arredondar);
					$v10[]=round($itp,$arredondar);
					$block6=round(($rows[$i+1][6]),$arredondar);
						if ($block6 == $v10[$i]) {
			
			echo '<div class="True">'.$block6;
		} else{
			
			echo '<div class="error">'.$block6;
		}

}

					 ?></td>
					  <td><?php
					  // y-yi
					  	for ($i=0; $i <$p ; $i++) {
						$itp=round((exp($b)*exp($var1[$i]*$a)),$arredondar);
	 					$zl=round(($var2[$i]- $itp),$arredondar);
						$va11[]=round($zl,$arredondar);
						$block7=round(($rows[$i+1][7]),$arredondar);
						if ($block7 == $va11[$i]) {
				
			echo '<div class="True">'.$block7;
		} else{
			
			echo '<div class="error">'.$block7;
		}

} ?>
	
</td>
				<td><?php
				//(y-yi)^2
					 for ($i=0; $i <$p ; $i++) { 
					$block8=round(($rows[$i+1][8]),$arredondar);
					$itp=round((exp($b)*exp($var1[$i]*$a)),$arredondar);
	 				$zl=round(($var2[$i]- $itp),$arredondar);
					$tp=round(pow($zl,2),$arredondar);
					$v9[]=$tp;
						if ($block8 == $v9[$i]) {
				
			echo '<div class="True">'. $block8 ;
		} else{
			
			echo '<div class="error">'. $block8 ;
		}

			}		  ?></td>
					 
				</tr>	
				
			</tbody>
		</table>
		<?php 
		echo "<br>";
		echo 'f(x)= '.round($a,$arredondar). 'X  + '.'('.round($b,$arredondar) .')';
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