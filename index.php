<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Norazo manse</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
</style>
</head>
<body>
	<table>
		<tr>
			<th>회차</th>
			<th>날짜</th>
			<th colspan="6">번호</th>
			<th>보너스</th>
			<th>맞은 개수</th>
			<th>비고</th>
		</tr>
		<tr>
			<td><i>MV</i></td>
			<td>2015년 02월 22일</td>
			<td>5</td>
			<td>9</td>
			<td>15</td>
			<td>22</td>
			<td>26</td>
			<td>43</td>
			<td colspan="3"></td>
		</tr>
		<?php
			$nipalzaya = array(0, 5, 9, 15, 22, 26, 43);
			
			$boolarray = Array(false => 'false', true => 'true'); // Temporary tool for development
			
			echo "\r\n";
			for($lottoNo = 639; $lottoNo < 716; $lottoNo++){ // since 639
				echo "\t\t" . '<tr>' . "\r\n";
				echo "\t\t\t" . '<td>' . $lottoNo . '</td>' . "\r\n";
				$file = fopen("data/" . $lottoNo . ".csv", "r");
				$data = fgetcsv($file);
				echo "\t\t\t" . '<td>' . $data[0] . '</td>' . "\r\n";
				$correct = 0;
				for($i = 1;$i < 7;$i++){ // test for each numbers of result
					$isCorrect[$i] = false;
					for($j = 1;$j < 7;$j++){
						if($data[$i] == $nipalzaya[$j]){
							$isCorrect[$i] = true;
							break;
						}
					}
					if($isCorrect[$i] == true){
						echo "\t\t\t" . '<th>' . $data[$i] . '</th>' . "\r\n";
						$correct++;
					}
					else{
						echo "\t\t\t" . '<td>' . $data[$i] . '</td>' . "\r\n";
					}
				}
				
				$isBonus = false;
				for($j = 1;$j < 7;$j++){
					if($data[7] == $nipalzaya[$j]){
						$isBonus = true;
					}
				}
				if($isBonus == true){
					echo "\t\t\t" . '<th>' . $data[7] . '</th>' . "\r\n";
				}
				else{
					echo "\t\t\t" . '<td>' . $data[7] . '</td>' . "\r\n";
				}
				echo "\t\t\t" . '<td>' . $correct . '</td>' . "\r\n";
				
				$result = 0;
				
				switch ($correct){
					case 6:
						$result = 1;
						break;
					case 5:
						if($isBonus == true){
							$result = 2;	
						}
						else{
							$result = 3;
						}
						break;
					case 4:
						$result = 4;
						break;
					case 3:
						$result = 5;
						break;
				}
				
				if($result == 0){ // not won
					echo "\t\t\t" . '<td>' . '</td>' . "\r\n";
				}
				else{
					echo "\t\t\t" . '<td>' . $result . '등' . '</td>' . "\r\n";
				}
				echo "\t\t" . '</tr>' . "\r\n";
			}
		?>
	</table>
	
	
	<div align="center">
		<img src="nipalzaya.png" width="80%">
	</div>
</body>
</html>